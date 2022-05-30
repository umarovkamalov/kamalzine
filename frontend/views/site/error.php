<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
        <div id="col-main" class="page-404 text-center">
            <div class="box-404">
                <div class="vcenter-container">
                    <div class="vcenter">
                        <h1>404</h1>
                        <p><?= nl2br(Html::encode($message)) ?></p>
                        <a href="<?= \yii\helpers\Url::to('@web/')?>" class="btn btn-default"><?= Yii::t('app','Back to homepage');?></a>
                    </div>
                </div>
            </div>
        </div>
