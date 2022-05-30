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

<div class="col-md-4 col-sm-4">
    <div class="layout_3--item border">
        <div class="layout_1--item">
            <?php if ($post->photo): ?>
                <div class="thumb" >
                    <a href="<?=$url; ?>" title="<?= \yii\helpers\Html::encode($post->title); ?>">
                        <img src="<?= Html::encode($post->getThumbFileUrl('photo', 'widget_also_list')); ?>" alt="<?= \yii\helpers\Html::encode($post->title); ?>" class="img-responsive">
                    </a>
                </div>
            <?php endif; ?>
            <span class="cat"><?= \yii\helpers\Html::encode($post->title); ?></span>
            <h4><a href="<?=$url; ?>" title="<?= Yii::t('app', 'Continue Reading')?>"><?= Yii::t('app', 'Continue Reading')?></a></h4>
            <p><?= Html::encode(StringHelper::truncateWords(strip_tags($post->description), 10)) ?>...</p>
            <div class="meta wow fadeIn" style="visibility: visible; animation-name: fadeIn;"><!--<span class="author">by Katie F.</span>--><span class="date"><?=  Yii::$app->formatter->asDate($post->created_at); ?> </span><span class="views"><?= shop\entities\Logs::countPost($post->id, shop\entities\Logs::CAT_POST);?></span></div>
        </div>
    </div>
</div>
<?php endforeach; ?>
