<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\Blog\TagForm */

$this->title = Yii::t('app','Create Tag');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
