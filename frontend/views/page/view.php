<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $page \shop\entities\Page */

$this->title = $page->getSeoTitle();

$this->registerMetaTag(['name' => 'description', 'content' => $page->meta->description]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $page->meta->keywords]);

foreach ($page->parents as $parent) {
    if (!$parent->isRoot()) {
        $this->params['breadcrumbs'][] = ['label' => $parent->title, 'url' => ['view', 'id' => $parent->id]];
    }
}
$this->params['breadcrumbs'][] = $page->title;
?>
<div class="page-content">
    <div class="au-text">
        <div class="container">
    <h1><?= Html::encode($page->title) ?></h1>
            <div class="content">
    <?= Yii::$app->formatter->asHtml($page->content, [
        'Attr.AllowedRel' => array('nofollow'),
        'HTML.SafeObject' => true,
        'Output.FlashCompat' => true,
        'HTML.SafeIframe' => true,
        'URI.SafeIframeRegexp'=>'%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
    ]) ?>

            </div>
        </div>
    </div>
</div>
