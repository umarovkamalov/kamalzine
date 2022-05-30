<?php

use shop\entities\Blog\Slider;
use shop\helpers\SliderHelper;
use shop\helpers\PostHelper;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\forms\Blog\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Slider');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">

    <p>
        <?= Html::a(Yii::t('app','Create Slider'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'value' => function (Slider $model) {
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
                        'value' => function (Slider $model) {
                            return SliderHelper::statusLabel($model->status);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'id',
                        'value' => function (Slider $model) {
                            return Html::a(Yii::t('app','Open'), ['view', 'id'=>$model->id]);
                        },
                        'format' => 'raw',
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
