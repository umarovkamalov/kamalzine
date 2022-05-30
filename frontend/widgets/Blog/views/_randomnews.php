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
        <li>
            <?php if ($post->photo): ?>
                <a href="<?=$url; ?>" title="<?= \yii\helpers\Html::encode($post->title); ?>" class="pull-left">
                    <img src="<?= Html::encode($post->getThumbFileUrl('photo', 'widget_list')); ?>" alt="<?= \yii\helpers\Html::encode($post->title); ?>" class="img-responsive">
                </a>
            <?php endif; ?>
            <h4><a href="<?=$url; ?>" title="<?= \yii\helpers\Html::encode($post->title); ?>"><?= Html::encode(StringHelper::truncateWords(strip_tags($post->description), 6)) ?>...</a></h4>
            <span><?=  Yii::$app->formatter->asDate($post->created_at); ?></span>
        </li>
    <?php endforeach; ?>