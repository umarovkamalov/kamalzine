<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'Cabinet');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cabinet-index">
    <div class="title-wrapper">
    <h3><?= Html::encode($this->title) ?></h3>
    </div>

        <?= Html::a(Yii::t('app', 'Edit Profile'), ['cabinet/profile/edit'], ['class' => 'btn btn-primary']) ?>

    <h4><?= Yii::t('app', 'Attach profile')?></h4>
    <?= yii\authclient\widgets\AuthChoice::widget([
        'baseAuthUrl' => ['cabinet/network/attach'],
    ]); ?>
</div>
