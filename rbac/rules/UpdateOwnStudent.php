<?php
/**
 * Created by PhpStorm.
 * User: wangmin
 * Date: 2016/3/31
 * Time: 14:08
 */

namespace wm00689\rbac\rules;


use backend\models\Student;
use yii\rbac\Rule;

class UpdateOwnStudent extends Rule
{
    public $name ;
    public function execute($user, $item, $params)
    {
        if($params['UpdateOwnStudent']){
            $student = Student::findOne(['user_id'=>\Yii::$app->request->get('id')]);
            if($student->current_belong==\Yii::$app->user->identity->id){
                return true;
            }else{
                return false;
            }
        }
    }
}