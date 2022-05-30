<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $menu shop\entities\Blog\Menu */
backend\assets\ViewAsset::register($this);
$this->title = $menu->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menu'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">

    <div class="col-md-12">
        <p align="left">
        <?php if ($menu->isActive()): ?>
            <?= Html::a(Yii::t('app', 'Draft'), ['draft', 'id' => $menu->id], ['class' => 'btn btn-primary', 'data-method' => 'post']) ?>
        <?php else: ?>
            <?= Html::a(Yii::t('app', 'Activate'), ['activate', 'id' => $menu->id], ['class' => 'btn btn-success', 'data-method' => 'post']) ?>
        <?php endif; ?>

            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $menu->id], ['class' => 'btn btn-primary']) ?>

            <a href="index" class="btn btn-success"><?= Yii::t('app', 'List')?></a>
        </p>
        <p align="right">
            <?php echo Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $menu->id], [
                'class' => 'btn btn-danger pull-right',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete the element?'),
                    'method' => 'post',
                ]
            ]) ?>
        </p>
    </div>

    <div class="box">
        <div class="box-header with-border"><?= Yii::t('app', 'Common'); ?></div>
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $menu,
                'attributes' => [
                    'id',
                    'name',
                    'url',
                    'type',
                    'status',
                    [
                        'attribute' => Yii::t('app', 'Status'),
                        'value' => \shop\helpers\MenuHelper::statusLabel($menu->status),
                        'format' => 'raw',
                    ],
                    'icon',
                    'title',
                    'parent_id',
                ],
            ]) ?>
        </div>
    </div>
</div>
