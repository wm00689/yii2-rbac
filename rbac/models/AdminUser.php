<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/9
 * Time: 15:24
 */

namespace wm00689\rbac\models;


use common\models\User;
use Yii;
use yii\base\ErrorException;
use yii\base\Model;

class AdminUser extends Model
{
    public $username;
    public $email;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

        ];
    }

    public static function findOne($id)
    {
        return User::find()->where(['id' => $id])->one();
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword('123456');
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }



    public static function add_roles($user_id, $role_names)
    {
        $auth = Yii::$app->authManager;

        if (is_array($role_names)) {
            foreach ($role_names as $role_name) {
                $role = $auth->getRole($role_name);
                $auth->assign($role, $user_id);
            }
        }
    }



    public static function add_permissions($user_id, $permissions)
    {
        $auth = Yii::$app->authManager;

        if ($permissions) {
            $permissions_arr = explode(',', $permissions);
            foreach ($permissions_arr as $permisssion) {
                if($permisssion!='root'){
                    $p = $auth->getPermission($permisssion);
                    $auth->assign($p, $user_id);
                }
            }

        }
    }


}
