<?php

/* @var $this yii\web\View */
/* @var $tag shop\entities\Blog\Tag */
/* @var $model shop\forms\manage\Blog\TagForm */

$this->title = Yii::t('app','Update Tag').': ' . $tag->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $tag->name, 'url' => ['view', 'id' => $tag->id]];
$this->params['breadcrumbs'][] = Yii::t('app','Update');
?>
<div class="content-wrapper">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
