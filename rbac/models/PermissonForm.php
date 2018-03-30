<?php
/**
 * Created by PhpStorm.
 * User: wm
 * Date: 2016/3/27
 * Time: 18:17
 */

namespace wm00689\rbac\models;


use backend\classes\common;
use Yii;

class PermissonForm extends ItemForm
{
    /**
     * @inheritdoc
     */
    public $type = self::TYPE_PERMISSION;

    public function save()
    {
        $auth = Yii::$app->authManager;
        $permission = $auth->createPermission($this->name);
        $permission->description = $this->description;
        return $auth->add($permission);
    }

    public static function permissions()
    {
        $permissions = common::allControllers();

        foreach ($permissions as $key => $permission) {

            $c[] = [
                'id' => $key,
                'text' => $permission['text'],
                'state' => ['opened' => true],
                'children' => $permission['children']

            ];

        }

        $root = [
            'id' => 'root',
            'text' => 'root',
            'state' => ['opened' => true],
            'children' => $c
        ];

        return $root;
    }

    public static function editTreeByItems($items)
    {

        $permissions_arrays = common::allControllers();
        $permissions = self::edit_permissions($permissions_arrays, $items);

        foreach ($permissions as $key => $permission) {
            $c[] = [
                'id' => $key,
                'text' => $permission['text'],
                'children' => $permission['children']
            ];
        }
        $root = [
            'id' => 'root',
            'text' => 'root',
            'children' => $c
        ];

        return $root;
    }

    private static function edit_permissions(&$permissions_arrays, $items)
    {
        foreach ($permissions_arrays as &$permissions_array) {

            if (in_array($permissions_array['id'], $items)) {
                $permissions_array['state'] = ['selected' => true];
            }

            if (isset($permissions_array['children'])) {

                self::edit_permissions($permissions_array['children'], $items);
            }
        }
        return $permissions_arrays;
    }
}