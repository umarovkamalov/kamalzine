<?php

/* @var $this yii\web\View */
/* @var $post shop\entities\Blog\Post\Post */
use frontend\widgets\Blog\CommentsWidget;
use yii\helpers\Html;

$this->title = $post->getSeoTitle();

$this->registerMetaTag(['name' =>'description', 'content' => $post->meta->description]);
$this->registerMetaTag(['name' =>'keywords', 'content' => $post->meta->keywords]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Blog'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $post->category->name, 'url' => ['category', 'slug' => $post->category->slug]];
$this->params['breadcrumbs'][] = $post->title;

$this->params['active_category'] = $post->category;

$tagLinks = [];
foreach ($post->tags as $tag) {
    $tagLinks[] = Html::a(Html::encode($tag->name), ['tag', 'slug' => $tag->slug]);
}
?>
<div class="col-md-8 col-sm-7 padding-bottom-30 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
    <div class="blog-excerpt wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <div class="blog-single-head wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <h2><?= Html::encode($post->title) ?></h2>
            <div class="meta wow fadeIn" style="visibility: visible; animation-name: fadeIn;"><!--<span class="author">by Mahita G.</span>--><span class="date"><?= Yii::$app->formatter->asDatetime($post->created_at); ?></span><span class="comments">3</span></div>
        </div>
        <?php if ($post->photo): ?>
            <img src="<?= Html::encode($post->getThumbFileUrl('photo', 'origin')) ?>" alt="" class="img-responsive" />
        <?php endif; ?>
        <?= Yii::$app->formatter->asHtml($post->content, [
            'Attr.AllowedRel' => array('nofollow'),
            'HTML.SafeObject' => true,
            'Output.FlashCompat' => true,
            'HTML.SafeIframe' => true,
            'URI.SafeIframeRegexp'=>'%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
        ]) ?>
    </div>


    <div class="clearfix wow fadeIn" style="visibility: hidden; animation-name: none;"></div>
    <div class="margin-bottom-10 wow fadeIn" style="visibility: hidden; animation-name: none;"></div>
    <div class="clearfix wow fadeIn" style="visibility: hidden; animation-name: none;"></div>

    <div class="single-topic wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <span>Topics:</span>
        <ul class="tags">
            <li><a href="#"><?= Yii::t('app','Tags')?>: <?= implode(', ', $tagLinks) ?></a></li>
        </ul>
    </div>

    <div class="post-author margin-bottom-90 wow fadeIn" style="visibility: hidden; animation-name: none;">
        <img src="images/author.png" alt="">

        <h5>Andrew Carnoy</h5>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
    </div>

    <div class="clearfix wow fadeIn" style="visibility: hidden; animation-name: none;"></div>

    <?= CommentsWidget::widget([
        'post' => $post,
    ]) ?>
</div>
<!--END-->
