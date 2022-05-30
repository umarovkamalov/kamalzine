<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\Blog\CategoryForm */

$this->title = Yii::t('app', 'Create Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

