<?php
/**
 * Created by PhpStorm.
 * User: wm
 * Date: 2016/3/27
 * Time: 17:58
 */

namespace wm00689\rbac\controllers;


use backend\modules\rbac\AuthorRule;
use backend\modules\rbac\models\PermissonForm;
use backend\modules\rbac\models\RuleForm;
use Yii;
use yii\web\Controller;

class RuleController extends Controller
{
    public function actionIndex()
    {
        $auth = Yii::$app->authManager;
        $rules = $auth->getRules();
        return $this->render('index',['rules'=>$rules]);
    }

    public function actionCreate()
    {
        $auth = Yii::$app->authManager;
        $model = new RuleForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){

            //$rule = new AuthorRule();
            $rule_class_name = '\backend\modules\rbac\rules\\'.$model->name;
            $rule = new $rule_class_name;
            $rule->name = $model->name;
            $auth->add($rule);

           /* $updateOwnPost = $auth->createPermission('updateOwnPost');
            $updateOwnPost->description = 'Update own post';
            $updateOwnPost->ruleName = $model->name;
            $auth->add($updateOwnPost);
           // dd($updateOwnPost);

         // "updateOwnPost" 权限将由 "updatePost" 权限使用
            $auth->addChild($updateOwnPost, $auth->getPermission('admin/student/update'));

        // 允许 "author" 更新自己的帖子
            $auth->addChild($auth->getRole('TMK'), $updateOwnPost);*/
            return $this->redirect('index');
        }else{
            Yii::$app->session->setFlash('errors',$model->getFirstErrors());
        }
        return $this->render('create');
    }

    public function actionUpdate($id)
    {
        $auth = Yii::$app->authManager;

        $old_rule = $auth->getRule($id);

        $model = new RuleForm();

        if($model->load(Yii::$app->request->post()) && $model->validate()){

            $auth->remove($old_rule);

            $rule = new AuthorRule();
            $rule->name = $model->name;
            $auth->add($rule);

            //$auth->update($model->name,$rule);

            return $this->redirect('index');
        }else{
            Yii::$app->session->setFlash('errors',$model->getFirstErrors());
        }
        return $this->render('update',['rule'=>$old_rule]);
    }

    public function actionDelete($id)
    {
        $auth = Yii::$app->authManager;
        $rule = $auth->getRule($id);
        $auth->remove($rule);
        return $this->redirect('index');
        
    }
}