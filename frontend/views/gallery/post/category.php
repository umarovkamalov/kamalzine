<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $category shop\entities\Blog\Category */

use yii\helpers\Html;

$this->title = $category->getSeoTitle();

$this->registerMetaTag(['name' =>'description', 'content' => $category->meta->description]);
$this->registerMetaTag(['name' =>'keywords', 'content' => $category->meta->keywords]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Blog'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $category->name;

$this->params['active_category'] = $category;
?>
<div class="container">
    <div class="row">
        <div class="title-wrapper">
            <h3><?= Html::encode($category->getHeadingTile()) ?></h3>
        </div>
        <?php if (trim($category->description)): ?>
        <div class="panel panel-default">
            <div class="panel-body">
                <?= Yii::$app->formatter->asHtml($category->description, [
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

<?php endif; ?>

<?= $this->render('_list', [
    'dataProvider' => $dataProvider
]) ?>


