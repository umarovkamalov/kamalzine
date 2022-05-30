<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $tag shop\entities\Blog\Tag */

backend\assets\ViewAsset::register($this);
$this->title = $tag->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">
    <p>
        <?= Html::a(Yii::t('app','Update'), ['update', 'id' => $tag->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','List'), ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app','Delete'), ['delete', 'id' => $tag->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app','Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="box">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $tag,
                'attributes' => [
                    'id',
                    'name',
                    'slug',
                ],
            ]) ?>
        </div>
    </div>
</div>
