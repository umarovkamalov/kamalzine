<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24.05.2018
 * Time: 14:33
 */
?>
<?php foreach ($posts as $post): ?>
    <?php $url = Url::to(['/blog/post/post', 'id' =>$post->id]); ?>

<div class="col-md-3 col-sm-3 margin-bottom-30 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
    <div class="layout_2--item no-margin wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <?php if ($post->photo): ?>
            <div class="thumb wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <a href="<?=$url; ?>" title="<?= \yii\helpers\Html::encode($post->title); ?>">
                    <img src="<?= Html::encode($post->getThumbFileUrl('photo', 'widget_list')); ?>" alt="<?= \yii\helpers\Html::encode($post->title); ?>" class="img-responsive">
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php endforeach; ?>
