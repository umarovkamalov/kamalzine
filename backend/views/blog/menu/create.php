<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\Shop\CategoryForm */

$this->title = Yii::t('app', 'Create Menu');
$this->params['breadcrumbs'][] = ['label' => 'Menu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
