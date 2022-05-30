<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\Blog\AdsForm */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="ads-form">
    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border"><?= Yii::t('app', 'Common')?></div>
                <div class="box-body">

                    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'type')->dropDownList($model->typesList()) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="box box-default">
        <div class="box-header with-border"><?= Yii::t('app', 'Photo')?></div>
        <div class="box-body">
            <?= $form->field($model, 'photo')->label(false)->widget(FileInput::class, [
                'options' => [
                    'accept' => 'image/*',
                ]
            ]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
