<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $post shop\entities\Blog\Post\Post */
/* @var $model shop\forms\manage\Blog\Post\PostForm */

$this->title = Yii::t('app','Update Slider').': ' . $slider->id;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $slider->id, 'url' => ['view', 'id' => $slider->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-wrapper">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
