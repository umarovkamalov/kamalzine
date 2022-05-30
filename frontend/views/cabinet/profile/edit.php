<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\User\UserEditForm */
/* @var $user shop\entities\User\User */

use kartik\form\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('app','Edit Profile');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Cabinet'), 'url' => ['cabinet/default/index']];
$this->params['breadcrumbs'][] = Yii::t('app','Profile');
?>
<div class="user-update">
    <div class="row">
        <div class="col-sm-6">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'email')->textInput(['maxLength' => true]) ?>
            <?= $form->field($model, 'phone', ['addon' => ['prepend' => ['content'=>'+']]])->textInput(['maxLength' => true]) ?>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app','Save'), ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
