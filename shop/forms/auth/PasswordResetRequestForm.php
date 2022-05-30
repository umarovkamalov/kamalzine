<?php
namespace shop\forms\auth;
use Yii;
use yii\base\Model;
use shop\entities\User\User;

class PasswordResetRequestForm extends Model
{
    public $email;

    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => User::class,
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with this email address.'
            ],
        ];
    }

    public function attributeLabels(): array
    {
        return[
            'email' => Yii::t('app', 'E-mail'),
        ];
    }
}
