<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>

<div class="content-wrapper full-page-wrapper d-flex align-items-center text-center error-page">
    <div class="col-lg-6 mx-auto">
        <h3 class="display-1"><?= $name ?> </h3>
        <h2>Internal server error! </h2><p><?= nl2br(Html::encode($message)) ?></p>
        <a class="btn btn-primary mt-5" href="<?= Yii::$app->homeUrl ?>"><?=Yii::t('app','Back to home')?> </a>
    </div>
</div>