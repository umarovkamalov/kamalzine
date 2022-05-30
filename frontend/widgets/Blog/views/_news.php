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

<div class="layout_2--item row wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
    <div class="col-md-5 col-sm-5 padding-right-10 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
    <?php if ($post->photo): ?>
        <div class="thumb wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <a href="<?=$url; ?>" title="<?= \yii\helpers\Html::encode($post->title); ?>">
                <img src="<?= Html::encode($post->getThumbFileUrl('photo', 'widget_list')); ?>" alt="<?= \yii\helpers\Html::encode($post->title); ?>" class="img-responsive">
            </a>
        </div>
    <?php endif; ?>
    </div>
    <div class="col-md-7 col-sm-7 padding-left-5 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <span class="cat"><?= Html::encode(StringHelper::truncateWords(strip_tags($post->title), 4)) ?>...</span>
        <a href="<?=$url; ?>" title="<?= Yii::t('app', 'Continue Reading')?>"><h4><?= Html::encode(StringHelper::truncateWords(strip_tags($post->description), 10)) ?>...</h4></a>
        <div class="meta wow fadeIn" style="visibility: visible; animation-name: fadeIn;"><span class="date"><?=  Yii::$app->formatter->asDate($post->created_at); ?> </span><span class="views"> <?= shop\entities\Logs::countPost($post->id, shop\entities\Logs::CAT_POST);?></span></div>
    </div>
</div>
    <hr class="12">
<?php endforeach; ?>