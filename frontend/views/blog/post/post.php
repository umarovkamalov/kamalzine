<?php

/* @var $this yii\web\View */
/* @var $post shop\entities\Blog\Post\Post */

use yii\helpers\Html;

$this->title = $post->getSeoTitle();

$this->registerMetaTag(['name' =>'description', 'content' => $post->meta->description]);
$this->registerMetaTag(['name' =>'keywords', 'content' => $post->meta->keywords]);

$this->params['breadcrumbs'][] = ['label' => 'Blog', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $post->category->name, 'url' => ['category', 'slug' => $post->category->slug]];
$this->params['breadcrumbs'][] = $post->title;

$this->params['active_category'] = $post->category;

$tagLinks = [];
foreach ($post->tags as $tag) {
    $tagLinks[] = Html::beginTag('li').Html::a(Html::encode($tag->name), ['tag', 'slug' => $tag->slug]).Html::endTag('li');
}
?>

<div class="col-md-8 col-sm-7 padding-bottom-30 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
    <div class="blog-excerpt wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <div class="blog-single-head wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <h2><?= Html::encode($post->title) ?></h2>
<<<<<<< HEAD
            <div class="meta wow fadeIn" style="visibility: visible; animation-name: fadeIn;"><!--<span class="author">by Mahita G.</span>--><span class="date"><?= Yii::$app->formatter->asDatetime($post->created_at); ?></span><span class="fa fa-eye"> 3</span></div>
=======
            <div class="meta wow fadeIn" style="visibility: visible; animation-name: fadeIn;"><!--<span class="author">by Mahita G.</span>--><span class="date"><?= Yii::$app->formatter->asDatetime($post->created_at); ?></span><span class=""><i class="fa fa-eye"></i> <?= shop\entities\Logs::countPost($post->id, shop\entities\Logs::CAT_POST);?></span></div>
>>>>>>> 815c3d89896515052e30cfb2d872caca2c4c2a45
        </div>
		<?php if($post->category->id != 5):?>
        <?php if ($post->photo): ?>
            <img src="<?= Html::encode($post->getThumbFileUrl('photo', 'origin')) ?>" alt="" class="img-responsive" />
        <?php endif; ?>
        <?php endif; ?>
        <?= Yii::$app->formatter->asHtml($post->content, [
            'Attr.AllowedRel' => array('nofollow'),
            'HTML.SafeObject' => true,
            'Output.FlashCompat' => true,
            'HTML.SafeIframe' => true,
            'URI.SafeIframeRegexp'=>'%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
        ]) ?>
    </div>


    <div class="clearfix" style="visibility: hidden; animation-name: none;"></div>
    <div class="margin-bottom-10" style="visibility: hidden; animation-name: none;"></div>
    <div class="clearfix" style="visibility: hidden; animation-name: none;"></div>

    <div class="single-topic" style="visibility: visible; animation-name: fadeIn;">
        <span><?= Yii::t('app','Tags')?>:</span>
        <ul class="tags">
            <?= implode(' ', $tagLinks) ?>
        </ul>
    </div>
    <div class="clearfix" style="visibility: hidden; animation-name: none;"></div>
    <div class="single-share" style="visibility: visible; animation-name: fadeIn;">
        <span><?= Yii::t('app','Share')?>:</span>
        <div class="post-share " style="visibility: visible; animation-name: fadeIn;">
            <a target="_blank" href="//www.facebook.com/sharer.php?u=<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" title="Facebook"><i class="fa fa-facebook"></i> Facebook</a>
            <a target="_blank" href="//twitter.com/share?url=<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" title="Twitter"><i class="fa fa-twitter"></i> Tweet</a>
            <a target="_blank" href="//plus.google.com/share?url=<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>" title="Google"><i class="fa fa-google-plus"></i> Google</a>
        </div>
    </div>
</div>
<!--END-->

<?php ob_start(); ?>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        var fp = new Fingerprint2();
        fp.get(function(result, components) {
            var token = $('meta[name=csrf-token]').attr('content');
            $.ajax({
                url: '/logs/add',
                type: 'post',
                dataType: 'json',
                data: {'_csrf-frontend':token,'LogsForm[token]': result, 'LogsForm[cat_id]': <?= shop\entities\Logs::CAT_POST; ?>, 'LogsForm[post_id]': <?= $post->id; ?>},
                success: function(data, response, textStatus, jqXHR) {
                    window.console.log(data);
                }
            });
        });
    });
</script>
<?php $this->registerJs(preg_replace('~^\s*<script.*>|</script>\s*$~ U', '', ob_get_clean())) ?>

