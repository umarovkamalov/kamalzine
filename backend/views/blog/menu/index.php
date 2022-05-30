<?php

use shop\entities\blog\Menu;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\forms\Shop\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">
    <h1 class="page-title"><?=Html::encode($this->title);?> </h1>
    <div class="row mb-4 card">
        <div class="col-lg-12 card-body">

    <p>
        <?= Html::a(Yii::t('app','Create Menu'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'attribute' => Yii::t('app', 'Name'),
                        'value' => function (Menu $model) {
                            return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => Yii::t('app', 'Title'),
                        'value' => function (Menu $model) {
                            return Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    'status',
                    'icon',
                    'url',
                    'parent_id',
                    ['class' => ActionColumn::class],
                ],
            ]); ?>

</div>
</div>
</div>
