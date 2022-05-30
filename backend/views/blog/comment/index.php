<?php

use shop\entities\Blog\Post\Comment;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\StringHelper;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $searchModel backend\forms\Blog\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">
    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    'id',
                    'created_at:datetime',
                    [
                        'attribute' => 'text',
                        'value' => function (Comment $model) {
                            return Html::a(StringHelper::truncate(strip_tags($model->text), 100), ['view', 'id' => $model->id, 'post_id' => $model->post_id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'active',
                        'filter' => $searchModel->activeList(),
                        'format' => 'boolean',
                    ],
                    ['class' => ActionColumn::class],
                ],
            ]); ?>
        </div>
    </div>
</div>
