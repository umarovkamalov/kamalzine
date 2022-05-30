<?php
use common\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \shop\forms\auth\LoginForm */

$this->title = Yii::t('app', 'Sign In');

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
            <div class="content-wrapper full-page-wrapper auth-pages login-2">
                <div class="card col-lg-4">
                    <div class="card-body px-5 py-5">
                        <h3 class="card-title text-left mb-3"><?= Yii::t('app', 'Login')?> </h3>
                        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientScript' => false, 'enableClientValidation' => false]); ?>
                        <div class="form-group"><?= Alert::widget() ?>
                                <label><?= Yii::t('app', 'Username')?> * </label>
                            <?= $form
                                ->field($model, 'username', $fieldOptions1)
                                ->label(false)
                                ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>
                            </div>
                            <div class="form-group">
                                <label><?= Yii::t('app', 'Password')?> * </label>
                                <?= $form
                                    ->field($model, 'password', $fieldOptions2)
                                    ->label(false)
                                    ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                                                                            </label>
                                </div>
                                <a href="#" class="forgot-pass"><?= Yii::t('app', 'Forgot password')?> </a>
                            </div>
                            <div class="text-center">
                                <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                            </div>

                            <p class="sign-up"><?= Yii::t('app', 'Don`t have an Account?')?> <a href="#"><?= Yii::t('app', 'Sign Up')?> </a></p>
                            <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->

