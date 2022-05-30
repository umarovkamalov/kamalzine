<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \shop\forms\auth\SignupForm */

use yii\helpers\Html;
use kartik\form\ActiveForm;

$this->title = Yii::t('app', 'Sign Up');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="row">
        <div class="col-md-5">&nbsp;</div>
        <div class="col-md-6">
            <div class="title-wrapper">
            <h3><?= Html::encode($this->title) ?></h3>
            </div>
            <p><?= Yii::t('app', 'Please fill out the following fields to signup')?>:</p>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'phone', ['addon' => ['prepend' => ['content'=>'+']]]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app','Sign Up'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
