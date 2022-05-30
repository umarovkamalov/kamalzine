<?php

use kartik\file\FileInput;
use shop\entities\Blog\Post\Modification;
use shop\entities\Blog\Post\Value;
use shop\helpers\PriceHelper;
use shop\helpers\PostHelper;
use shop\helpers\WeightHelper;
use yii\bootstrap\ActiveForm;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $slider shop\entities\Blog\Post\Post */
/* @var $modificationsProvider yii\data\ActiveDataProvider */
backend\assets\ViewAsset::register($this);
$this->title = $slider->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slider'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">
    <p>
        <?php if ($slider->isActive()): ?>
            <?= Html::a(Yii::t('app','Draft'), ['draft', 'id' => $slider->id], ['class' => 'btn btn-primary', 'data-method' => 'post']) ?>
        <?php else: ?>
            <?= Html::a(Yii::t('app','Activate'), ['activate', 'id' => $slider->id], ['class' => 'btn btn-success', 'data-method' => 'post']) ?>
        <?php endif; ?>
        <?= Html::a(Yii::t('app','Update'), ['update', 'id' => $slider->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','Index'), ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app','Delete'), ['delete', 'id' => $slider->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app','Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="box">
        <div class="box-header with-border"><?= Yii::t('app','Common'); ?></div>
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $slider,
                'attributes' => [
                    'id',
                    [
                        'attribute' => 'status',
                        'value' => PostHelper::statusLabel($slider->status),
                        'format' => 'raw',
                    ],
                    'type',
                    'url',
                ],
            ]) ?>
        </div>
    </div>
    <div class="box">
        <div class="box-header with-border"><?= Yii::t('app', 'Photo')?></div>
        <div class="box-body">
            <?php if ($slider->photo): ?>
                <?= Html::a(Html::img($slider->getThumbFileUrl('photo', 'thumb')), $slider->getUploadedFileUrl('photo'), [
                    'class' => 'thumbnail',
                    'target' => '_blank'
                ]) ?>
            <?php endif; ?>
        </div>
    </div>
</div>
