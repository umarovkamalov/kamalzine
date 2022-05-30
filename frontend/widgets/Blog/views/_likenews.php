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

<div id="shopify-section-1489575833562" class="shopify-section">

    <div class="blog-container">
        <div class="container">
            <div class="title-wrapper">
                <h3><?= Yii::t('app','OUR LATEST NEWS')?> </h3>
            </div>
            <div class="row">
                <?php foreach ($posts as $post): ?>
                    <?php $url = Url::to(['/blog/post/post', 'id' =>$post->id]); ?>
                <div class="post-item col-md-3 col-sm-3 col-xs-12">

                    <div class="post-item-inner">
                        <?php if ($post->photo): ?>
                        <div class="post-image">
                            <a href="<?=$url; ?>" title="<?= \yii\helpers\Html::encode($post->title); ?>">
                                <img src="<?= Html::encode($post->getThumbFileUrl('photo', 'widget_list')); ?>" alt="<?= \yii\helpers\Html::encode($post->title); ?>" />
                            </a>
                        </div>
                         <?php endif; ?>
                        <div class="post-content">
                            <div class="meta-data"><span class="date"><?=  Yii::$app->formatter->asDate($post->created_at); ?> </span></div>
                            <a class="post-title" href="<?=$url; ?>"><?= \yii\helpers\Html::encode($post->title); ?>  </a>
                            <p><?= Html::encode(StringHelper::truncateWords(strip_tags($post->description), 20)) ?>...</p>
                            <a class="link-to-post" href="<?=$url; ?>" title="<?= Yii::t('app', 'Continue Reading')?>"><?= Yii::t('app', 'Continue Reading')?> </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="view-all">
                <a href="/blog/news"><?= Yii::t('app','View all News')?> </a>
            </div>

        </div>
    </div>

</div>