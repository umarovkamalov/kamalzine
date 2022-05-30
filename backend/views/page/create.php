<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\PageForm */

$this->title = Yii::t('app', 'Create Page');
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
