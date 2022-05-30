<?php

/* @var $this yii\web\View */
/* @var $menu shop\entities\Shop\Category */
/* @var $model shop\forms\manage\Shop\CategoryForm */

$this->title = Yii::t('app','Update Menu').': '. $menu->name;
$this->params['breadcrumbs'][] = ['label' => 'Menu', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $menu->name, 'url' => ['view', 'id' => $menu->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-wrapper">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
