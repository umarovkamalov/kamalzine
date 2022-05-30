<?php

namespace shop\forms;


use shop\entities\Logs;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * @property LogsForm $translations
 */
class LogsForm extends Model
{

    public $cat_id;
    public $post_id;
    public $token;
    public $count;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'token', 'cat_id'], 'required'],
            [['cat_id', 'post_id'], 'integer'],
            [['token'], 'string'],
        ];
    }

    public function validateDuplicate(LogsForm $form): bool
    {
       /*$cookies = Yii::$app->request->cookies;
        if (($cookie = $cookies->get('cookie_token')) !== null) {
            $token = $cookie->value;
        }else{
            $token = $form->token;
        }*/

        if(Logs::find()
            ->where([
                    'post_id' => $form->post_id,
                    'cat_id' => $form->cat_id,
                    'token' => $form->token,
                ])
            ->one()){
            return false;
        }
        return true;

    }

}