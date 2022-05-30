<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<?php $this->beginContent('@frontend/views/layouts/main.php') ?>

<div class="row">
    <div id="content" class="col-md-9">
        <?= $content ?>
    </div>
    <aside id="column-right" class="col-md-3 hidden-xs">
        <div class="list-group">
            <a href="<?= Html::encode(Url::to(['/auth/auth/login'])) ?>" class="list-group-item"><?= Yii::t('app', 'Login'); ?></a>
            <a href="<?= Html::encode(Url::to(['/auth/signup/request'])) ?>" class="list-group-item"><?= Yii::t('app', 'Sign Up'); ?></a>
            <a href="<?= Html::encode(Url::to(['/auth/reset/request'])) ?>" class="list-group-item"><?= Yii::t('app', 'Forgotten Password'); ?></a>
            <a href="<?= Html::encode(Url::to(['/cabinet/default/index'])) ?>" class="list-group-item"><?= Yii::t('app', 'My Account'); ?></a>
            <a href="<?= Html::encode(Url::to(['/cabinet/wishlist/index'])) ?>" class="list-group-item"><?= Yii::t('app', 'Wish List'); ?></a>
            <a href="/account/order" class="list-group-item"><?= Yii::t('app', 'Order History'); ?></a>
            <a href="/account/newsletter" class="list-group-item"><?= Yii::t('app', 'Newsletter'); ?></a>
        </div>
    </aside>
</div>

<?php $this->endContent() ?>
