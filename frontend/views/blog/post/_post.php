<?php

/* @var $this yii\web\View */
/* @var $model shop\entities\Blog\Post\Post */

use yii\helpers\Html;
use yii\helpers\Url;

$url = Url::to(['post', 'id' =>$model->id]);
?>

<div class="row wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
    <div class="layout_3--item wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <div class="col-md-5 col-sm-6 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <?php if ($model->photo): ?>
            <div class="thumb wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <div class="icon-24 video2 wow fadeIn" style="visibility: visible; animation-name: fadeIn;"></div>
                <a href="<?= Html::encode($url) ?>" ><img src="<?= Html::encode($model->getThumbFileUrl('photo', 'widget_also_list')) ?>" class="img-responsive" alt="<?= Html::encode($model->title) ?>"></a>
            </div>
            <?php endif; ?>
        </div>

        <div class="col-md-7 col-sm-6 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <span class="cat"><?= Html::encode($model->category->name) ?></span>
            <h4><a href="<?= Html::encode($url) ?>"><?= Html::encode($model->title) ?></a></h4>
            <p><?= Yii::$app->formatter->asNtext($model->description) ?></p>
            <div class="meta wow fadeIn" style="visibility: visible; animation-name: fadeIn;"><!--<span class="author">by Katie F.</span>--><span class="date"><?=  Yii::$app->formatter->asDate($model->created_at); ?> </span><span class="views"><?= shop\entities\Logs::countPost($model->id,shop\entities\Logs::CAT_POST);?></span></div>
        </div>
        <hr class="14">
    </div>
</div>
