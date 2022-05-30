<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $category shop\entities\Shop\Category */

use yii\helpers\Html;

$this->title = Yii::t('app','Blog');
$this->params['breadcrumbs'][] = $this->title;
?>

    <!-- CATEGORY -->
    <div class="container padding-bottom-30">
        <div class="title-wrapper">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="row">

            <?= $this->render('_list', [
                'dataProvider' => $dataProvider
            ]) ?>
            <?= \frontend\widgets\Blog\CategoriesWidget::widget(); ?>
            <!-- // SIDEBAR -->

        </div>
    </div>
<!-- // CONTENT -->

