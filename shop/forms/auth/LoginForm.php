<?php
namespace shop\forms\auth;
use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
        ];
    }
    public function attributeLabels(): array
    {
       return[
           'username' => Yii::t('app', 'Username'),
           'password' => Yii::t('app', 'Password'),
           'rememberMe' => Yii::t('app', 'Remember Me'),
       ];
    }
}
