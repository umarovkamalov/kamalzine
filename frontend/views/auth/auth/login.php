<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \shop\forms\auth\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = Yii::t('app','Sign In');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-sm-6">
        <div class="well">
            <div class="title-wrapper">
                <h3><?= Yii::t('app', 'New Customer')?></h3>
            </div>
            <p><strong><?=Yii::t('app','Register Account')?></strong></p>
            <p>By creating an account you will be able to shop faster, be up to date on an order's status,
                and keep track of the orders you have previously made.</p>
            <a href="<?= Html::encode(Url::to(['/auth/signup/request'])) ?>" class="btn btn-primary"><?= Yii::t('app', 'Continue')?></a>
        </div>
        <div class="well">
            <div class="title-wrapper">
            <h3><?= Yii::t('app', 'Social Login')?></h3>
            </div>
            <?= yii\authclient\widgets\AuthChoice::widget([
                'baseAuthUrl' => ['auth/network/auth']
            ]); ?>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="well">
            <div class="title-wrapper">
            <h3><?= Yii::t('app', 'Returning Customer')?></h3>
            </div>
            <p><strong><?= Yii::t('app', 'I am a returning customer')?></strong></p>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput() ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div style="color:#999;margin:1em 0">
                <?= Yii::t('app','If you forgot your password you can')?> <?= Html::a(Yii::t('app', 'reset it'), ['auth/reset/request']) ?>.
            </div>

            <div>
                <?= Html::submitButton(Yii::t('app','Sign In'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
