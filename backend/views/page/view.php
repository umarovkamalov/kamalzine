<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $page shop\entities\Page */
backend\assets\ViewAsset::register($this);
$this->title = $page->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $page->id], ['class' => 'btn btn-primary']) ?>
        <?=''.Html::beginForm(['delete', 'id'=>$page->id], 'post')
        .Html::beginTag('button',['type'=>'submit', 'class'=>'btn btn-danger',
            'data-confirm'=>Yii::t('app', 'Are you sure you want to delete this item?')])
        .Html::beginTag('i',['class'=>'fa fa-trash-o'])
        .Html::endTag('i')
        .Html::decode(Yii::t('app', 'Delete'))
        .Html::endTag('button')
        .Html::endForm().''; ?>
        <a href="index" class="btn btn-success"><?= Yii::t('app', 'List')?></a>
    </p>

    <div class="box">
        <div class="box-header with-border"><?= Yii::t('app', 'Common')?></div>
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $page,
                'attributes' => [
                    'id',
                    'title',
                    'slug',
                ],
            ]) ?>
        </div>
    </div>

    <div class="box">
        <div class="box-header with-border"><?= Yii::t('app', 'Content')?></div>
        <div class="box-body">
            <?= Yii::$app->formatter->asHtml($page->content, [
                'Attr.AllowedRel' => array('nofollow'),
                'HTML.SafeObject' => true,
                'Output.FlashCompat' => true,
                'HTML.SafeIframe' => true,
                'URI.SafeIframeRegexp'=>'%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
            ]) ?>
        </div>
    </div>

    <div class="box">
        <div class="box-header with-border">SEO (Google, Yandex)</div>
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $page,
                'attributes' => [
                    'meta.title',
                    'meta.description',
                    'meta.keywords',
                ],
            ]) ?>
        </div>
    </div>
</div>
