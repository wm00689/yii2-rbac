<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace wm00689\rbac\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class RoleForm extends ItemForm
{
    /**
     * @inheritdoc
     */
    public $type = self::TYPE_ROLE;

    public function save()
    {
        $auth = Yii::$app->authManager;

        $role = $auth->createRole($this->name);
        $role->description = $this->description;
        return $auth->add($role);
    }

    public function add_role_permissions()
    {
        $transaction = Yii::$app->db->beginTransaction();
        $auth = Yii::$app->authManager;

        if ((!$auth->getRole($this->name))) {
            $role = $auth->createRole($this->name);
            $role->description = $this->description;
            if (!($auth->add($role))) {
                $transaction->rollBack();
                return json_encode(['status' => 'n', 'info' => '角色名称添加失败']);
            }
        }else{
                return json_encode(['status' => 'n', 'info' => '角色名称已经存在']);
        }

        $permissions = explode(',', Yii::$app->request->post('ids'));
        if ($permissions) {
            foreach ($permissions as $permission) {
                $item = $auth->getPermission($permission);
                if ($item) {
                    if (!($auth->addChild($role, $item))) {
                        $transaction->rollBack();
                        return json_encode(['status' => 'n', 'info' => '添加权限失败']);
                    }
                }

            }
        }

        $transaction->commit();
        return json_encode(['status'=>'y','info'=>'提交成功']);
    }

    public function edit_role_permissions($auth,$role,$permissions)
    {
        $transaction = Yii::$app->db->beginTransaction();

        if ($permissions) {
            $auth->removeChildren($role);
            foreach ($permissions as $permission) {
                $item = $auth->getPermission($permission);
                if ($item) {
                    if (!($auth->addChild($role, $item))) {
                        $transaction->rollBack();
                        return json_encode(['status' => 'n', 'info' => '添加权限失败']);
                    }
                }

            }
        }

        $transaction->commit();
        Yii::info(Yii::$app->user->identity->username.' edit_role_permissions','rbac');
        return json_encode(['status'=>'y','info'=>'编辑成功']);
    }

    public static function getMixedRolesByUserId($userId)
    {
        $auth = Yii::$app->authManager;

        $roles = json_decode(json_encode($auth->getRoles()),true);
        $user_roles = json_decode(json_encode($auth->getRolesByUser($userId)),true);

        $user_roles_name = ArrayHelper::getColumn($user_roles,'name');

        foreach ($roles as &$role){
            if(in_array($role['name'],$user_roles_name)){

                $role['state'] = true;
            }
        }

        return $roles;

    }

}
