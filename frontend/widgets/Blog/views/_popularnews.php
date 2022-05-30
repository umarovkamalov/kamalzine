<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use shop\entities\Logs;
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24.05.2018
 * Time: 14:33
 */
?>

<?php foreach ($posts as $post): ?>
    <?php $url = Url::to(['/blog/post/post', 'id' =>$post['post_id']]); ?>

<div class="layout_2--item row wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
    <div class="col-md-5 col-sm-5 padding-right-10 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <?php if ($post['photo']): ?>
            <div class="thumb wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <a href="<?=$url; ?>" title="<?= \yii\helpers\Html::encode($post['title']); ?>" class="img-responsive">
                    <img src="<?= $postclass->wherePhoto($post['post_id']) ?>" alt="<?= \yii\helpers\Html::encode($post['title']); ?>" class="img-responsive">
                </a>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-md-7 col-sm-7 padding-left-5 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <a href="<?=$url; ?>" title="<?= Yii::t('app', 'Continue Reading')?>">
            <h4><?= Html::encode(StringHelper::truncateWords(strip_tags($post['description']), 5)) ?>...</h4>
        </a>
        <div class="meta wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <span class="date"><?=  Yii::$app->formatter->asDate($post['created_at']); ?></span>
        <span class="views"><?= Logs::countPost($post['post_id'], 0);?></span></div>
    </div>
</div>
    <hr class="14">
<?php endforeach; ?>

