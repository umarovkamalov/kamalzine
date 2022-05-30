<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $category shop\entities\Shop\Category */

use yii\helpers\Html;

$this->title = Yii::t('app','News');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-8 col-sm-7 dual-posts padding-bottom-30">
    <h2><?= Html::encode($this->title) ?></h2>
    <?= $this->render('_list', [
        'dataProvider' => $dataProvider
    ]) ?>
</div>
