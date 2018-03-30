<?php
/**
 * Created by PhpStorm.
 * User: feli
 * Date: 2018/1/7
 * Time: AM11:09
 */

namespace wm00689\rbac\controllers;



//use backend\modules\admin\Module;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;


class DashboardController extends Controller
{
    public function init()
    {
        $this->viewPath = '@vendor/wm00689/assets/rbac/views/dashboard';
        parent::init();
    }

    public function actionIndex()
    {
        return $this->render('index');
    }


    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


}