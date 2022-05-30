<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $post shop\entities\Blog\Post\Post */
/* @var $model shop\forms\manage\Blog\Post\PostForm */

$this->title = Yii::t('app','Update Post').': ' . $post->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $post->title, 'url' => ['view', 'id' => $post->id]];
$this->params['breadcrumbs'][] = Yii::t('app','Update');
?>
<div class="content-wrapper">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
