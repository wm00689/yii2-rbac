<?php
/**
 * Created by PhpStorm.
 * User: feli
 * Date: 2018/1/29
 * Time: PM8:04
 */

namespace wm00689\rbac;

use Yii;
use yii\base\Module;
use yii\helpers\VarDumper;

class common
{
    static function allControllers()
    {
        $modules = Yii::$app->modules;

        unset($modules['gii']);
        unset($modules['debug']);

        foreach ($modules as $key => $module) {
            $config = Yii::$app->getModule($key)->config;
            $children = Yii::$app->getModule($key)->controllers;
            $c[$key] = [
                'id' => $key,
                'text' => $config['text'],
                'd' => $config['d'],
                'children' => $children
            ];

            foreach ($children as $k => $child) {

                if ($child['l'] == 'm') {
                    if (Yii::$app->getModule($child['id'])) {

                        $chs = Yii::$app->getModule($child['id'])->controllers;
                        $c[$key]['children'][$k]['children'] = $chs;
                    }

                }
            }


        }

        return $c;
    }

    public static function nav()
    {
        $navs = self::allControllers();
        $uri = Yii::$app->requestedAction->controller->getRoute();
        $uri_arr = explode('/', $uri);
        $active_module = $uri_arr[0];
        foreach ($navs as $key => $nav) {
            $topNav[$key] = $nav;
            if ($nav['id'] == $active_module) {
                $topNav[$key]['active'] = true;
            }
        }

        $left_navs = Yii::$app->getModule($active_module)->controllers;

        $active_module = $uri_arr[0] . '/' . $uri_arr[1];
        foreach ($left_navs as $k => $left_nav) {
            $leftNav[$k] = $left_nav;
            if ($left_nav['id'] == $active_module) {
                $leftNav[$k]['active'] = true;
            }
        }

        if (Yii::$app->hasModule($uri_arr[0] . '/' . $uri_arr[1])) {
            $content_navs = Yii::$app->controller->module->controllers;
            $active_module = $uri_arr[0] . '/' . $uri_arr[1] . '/' . $uri_arr[2];
            foreach ($content_navs as $i => $content_nav) {
                $contentNav[$i] = $content_nav;
                if ($content_nav['id'] == $active_module) {
                    $contentNav[$i]['active'] = true;
                }
            }
        }

        return ['topNav' => $topNav, 'leftNav' => $leftNav, 'contentNav' => isset($contentNav) ? $contentNav : null];

    }

    public static function getActiveItem()
    {
        $item = Yii::$app->requestedAction->controller->getRoute();
        $auth = Yii::$app->authManager;
        $item_name = $auth->getPermission($item)->description;
        return $item_name;

    }

    public static function dell($model)
    {
        $model->status = -1;
        $model->save();
    }


}