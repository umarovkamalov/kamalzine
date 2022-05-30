<?php

/* @var $this \yii\web\View */
/* @var $content string */

?>
<?php $this->beginContent('@frontend/views/layouts/main.php') ?>

<div class="container single-post padding-bottom-30">
    <div class="row">

        <div class="clearfix"></div>
        <?= $content ?>

    <!-- SIDEBAR -->
        <aside class="col-md-4 col-sm-4">
            <div class="side-widget margin-bottom-50">
                <h3 class="heading-1"><span><?= Yii::t('app', 'Category')?></span></h3>
                <ul class="side-posts">
                    <!--Item-->
                    <?= \frontend\widgets\Blog\CategoriesWidget::widget(); ?>
                    <!--Item ENd-->
                </ul>
            </div>
            <h3 class="heading-1"><span><?= Yii::t('app', 'The popular')?></span></h3>
            <!---Item-->
            <?= \frontend\widgets\Blog\PopularNewsWidget::widget(['limit' => 4]); ?>
            <!---Item END-->
            <h3 class="heading-1"><span><?= Yii::t('app', 'Advertisement')?></span></h3>
            <!--Advertisement-->
            <?= \frontend\widgets\Main\AdsWidget::widget(); ?>
            <!--Advertisement END-->
            <div class="side-widget margin-bottom-60">
                <h3 class="heading-1"><span><?= Yii::t('app','Tags')?></span></h3>
                    <?= \frontend\widgets\Blog\TagWidget::widget(); ?>
                <div class="clearfix"></div>
            </div>
        </aside>

    <!-- // SIDEBAR -->
    </div>
</div>
<!-- // CONTENT -->

<?php $this->endContent() ?>
