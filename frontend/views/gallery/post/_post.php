<?php

/* @var $this yii\web\View */
/* @var $model shop\entities\Blog\Post\Post */

use yii\helpers\Html;
use yii\helpers\Url;

$url = Url::to(['post', 'id' =>$model->id]);
?>
<div class="row">
    <div class="layout_3--item">
        <div class="col-md-5 col-sm-6">
            <div class="thumb">
                <div class="icon-24 video2"></div>
                <?php if ($model->photo): ?>
                <a href="<?= Html::encode($url) ?>">
                  <img src="<?= Html::encode($model->getThumbFileUrl('photo', 'blog_list')) ?>" alt="<?= Html::encode($model->title) ?>" class="img-responsive" />
                </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-7 col-sm-6">
            <span class="cat">Tech</span>
            <h4><a href="post_page_01.html"><?= Html::encode($model->title) ?></a></h4>
            <p><?= Yii::$app->formatter->asNtext($model->description) ?>...</p>
            <div class="meta"><span class="author">by Admin</span><span class="date">Sep. 25, 2016</span><span class="views">728</span></div>
        </div>
    </div>
</div>
