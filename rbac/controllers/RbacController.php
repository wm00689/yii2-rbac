<?php
/**
 * Created by PhpStorm.
 * User: feli
 * Date: 2018/3/27
 * Time: PM9:51
 */

namespace wm00689\rbac\controllers;

use yii\web\Controller;

class RbacController extends Controller
{
    public function init()
    {
        parent::init();
        $this->layout = '@vendor/wm00689/assets/rbac/views/layouts/admin';
        $this->viewPath = '@vendor/wm00689/assets/rbac/views';
    }
}