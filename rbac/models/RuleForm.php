<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
namespace wm00689\rbac\models;

use backend\modules\admin\modules\rbac\AuthorRule;
use Yii;
use yii\base\Model;

/**
 * Rule represents a business constraint that may be associated with a role, permission or assignment.
 *
 * @author Alexander Makarov <sam@rmcreative.ru>
 * @since 2.0
 */
class RuleForm extends Model
{
    /**
     * @var string name of the rule
     */
    public $name;
    /**
     * @var integer UNIX timestamp representing the rule creation time
     */
    public $createdAt;
    /**
     * @var integer UNIX timestamp representing the rule updating time
     */
    public $updatedAt;
    
    

    public function rules()
    {
        return [
            [['name'], 'required'],
        ];
    }

    public function save()
    {
        $auth = Yii::$app->authManager;
        $rule = new AuthorRule();
        $rule->name = $this->name;
        return $auth->add($rule);
    }


}
