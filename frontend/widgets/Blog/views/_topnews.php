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

    <div class="layout_1--item">
    <?php if ($post->photo): ?>
            <a href="<?=$url; ?>" title="<?= \yii\helpers\Html::encode($post->title); ?>">
                <span class="badge text-uppercase badge-overlay badge-lifestyle"><?= $post->category->name; ?></span>
                <div class="overlay"></div>
                <img src="<?= Html::encode($post->getThumbFileUrl('photo', 'widget_top_list')); ?>" alt="<?= \yii\helpers\Html::encode($post->title); ?>" class="img-responsive">
                <div class="layout-detail padding-25">
                    <h4><?= Html::encode(StringHelper::truncateWords(strip_tags($post->title), 3)) ?>...</h4>
                    <p><?= Html::encode(StringHelper::truncateWords(strip_tags($post->description), 6)) ?>...</p>
                    <div class="meta"><span class="date"><?=  Yii::$app->formatter->asDate($post->created_at); ?></span><span class="views"><?= shop\entities\Logs::countPost($post->id, shop\entities\Logs::CAT_POST);?></span></div>
                </div>
            </a>
    <?php endif; ?>
</div>
<?php endforeach; ?>


