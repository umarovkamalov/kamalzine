<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $tag shop\entities\Shop\Tag */

use yii\helpers\Html;

$this->title = Yii::t('app','Posts with tag') . $tag->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Blog'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $tag->name;
?>
<div class="title-wrapper">
<h3><?= Yii::t('app','Posts with tag'); ?> <label><?= Html::encode($tag->name) ?></label></h3>
</div>
<?= $this->render('_list', [
    'dataProvider' => $dataProvider
]) ?>


