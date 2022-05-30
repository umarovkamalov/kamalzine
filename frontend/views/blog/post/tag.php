<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $tag shop\entities\Shop\Tag */

use yii\helpers\Html;

$this->title = Yii::t('app','Posts with tag') . $tag->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app','News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $tag->name;
?>
<div class="col-md-8 col-sm-7 dual-posts padding-bottom-30">
    <h2><?= Yii::t('app', 'Posts with tag <label>{username}</label>', [
            'username' => $tag->name,
        ]);

    ?> </h2>
    <?= $this->render('_list', [
    'dataProvider' => $dataProvider
    ]) ?>
</div>
