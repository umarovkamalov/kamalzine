<?php

use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\Blog\Post\PostForm */

$this->title = 'Create Ads';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
