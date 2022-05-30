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

<div class="container">
    <div class="layout_1 margin-bottom-60">
        <div class="row">
            <h3 class="heading-1"><span><?= Yii::t('app', 'Video news')?></span></h3>
<?php foreach ($posts as $post): ?>
    <?php $url = Url::to(['/blog/post/post', 'id' =>$post->id]); ?>
            <div class="col-md-4">
                <div class="layout_1--item">
                    <a href="<?=$url; ?>" >
                        <div class="overlay"></div>
                        <?php if ($post->photo): ?>
                            <img src="<?= Html::encode($post->getThumbFileUrl('photo', 'widget_video_list')); ?>" class="img-responsive" alt="<?= \yii\helpers\Html::encode($post->title); ?>">
                        <?php endif; ?>
                        <div class="layout-detail padding-25">
                            <div class="icon-32 video"></div>
                            
                            <p><?= Html::encode(StringHelper::truncateWords(strip_tags($post->title), 6)) ?>...</p>
                            <div class="meta"><span class="date"><?=  Yii::$app->formatter->asDate($post->created_at); ?></span><span class="views"><?= shop\entities\Logs::countPost($post->id, shop\entities\Logs::CAT_POST);?></span></div>
                        </div>
                    </a>
                </div>
            </div>
<?php endforeach; ?>

            <div class="col-md-4">
                <div class="layout_1--item">
                    <a href="<?= Url::toRoute(['/blog/video'])?>">
                        <img src="<?= Url::to('@web/')?>images/category/01/face.jpg" class="img-responsive" alt="img">
                        <div class="layout-detail padding-25">
                            <div class="icon-32 gallery2"></div>
                            <h4>Посмотреть еще...</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
