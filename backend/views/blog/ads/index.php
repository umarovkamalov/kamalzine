<?php

use shop\entities\Blog\Ads;
use shop\helpers\AdsHelper;
use shop\helpers\PostHelper;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\forms\Blog\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ads');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">

    <p>
        <?= Html::a(Yii::t('app','Create Ads'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'value' => function (Ads $model) {
                            return $model->photo ? Html::img($model->getThumbFileUrl('photo', 'admin')) : null;
                        },
                        'format' => 'raw',
                        'contentOptions' => ['style' => 'width: 100px'],
                    ],
                    'id',
                    'type',
                    'url',
                    'created_at:datetime',
                    [
                        'attribute' => 'status',
                        'filter' => $searchModel->statusList(),
                        'value' => function (Ads $model) {
                            return AdsHelper::statusLabel($model->status);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'id',
                        'value' => function (Ads $model) {
                            return Html::a(Yii::t('app','Open'), ['view', 'id'=>$model->id]);
                        },
                        'format' => 'raw',
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
