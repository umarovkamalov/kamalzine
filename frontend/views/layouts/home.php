<?php

/* @var $this \yii\web\View */
/* @var $content string

use frontend\widgets\Blog\LastPostsWidget;
use frontend\widgets\shop\FeaturedProductsWidget;
//\frontend\assets\OwlCarouselAsset::register($this);
*/
?>
<?php $this->beginContent('@frontend/views/layouts/main.php') ?>


    <div class="container">
        <div class="row">
            <aside class="col-md-3 col-sm-3">
                <div class="side-widget margin-bottom-50">
                    <h3 class="heading-1"><span><?= Yii::t('app', 'Category')?></span></h3>
                    <!--Item-->
                    <?= \frontend\widgets\Blog\CategoriesWidget::widget(); ?>
                    <!--Item ENd-->
                    <br>
                    <div class="side-widget margin-bottom-60">
                        <h3 class="heading-1"><span><?= Yii::t('app','Tags')?></span></h3>
                        <?= \frontend\widgets\Blog\TagWidget::widget(); ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </aside>
            <div class="col-md-5 col-sm-5">
                <div class="layout_1 margin-bottom-30">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="heading-1"><span><?= Yii::t('app', 'Top news')?></span></h3>
                            <div class="post-carousel-wrap">
                                <div class="post-carousel">
                                    <!--Item-->
                                    <?= \frontend\widgets\Blog\TopNewsWidget::widget(['limit' => 4, 'category_id' => 2]); ?>
                                    <!--Item END-->
                                </div>

                                <a class="prev"><i class="fa fa-angle-left"></i></a>
                                <a class="next"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dual-item2 margin-bottom-30 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    <!---Item-->
                    <?= \frontend\widgets\Blog\NewsWidget::widget(['limit' => 4, 'category_id' => 2]); ?>
                    <!---Item END-->
                </div>
            </div>
            <aside class="col-md-4 col-sm-4">
                <h3 class="heading-1"><span><?= Yii::t('app', 'The popular')?></span></h3>
                <!---Item-->
                <?= \frontend\widgets\Blog\PopularNewsWidget::widget(['limit' => 4]); ?>
                <!---Item END-->
                <h3 class="heading-1"><span><?= Yii::t('app', 'Advertisement')?></span></h3>
                <!--Advertisement-->
                <?= \frontend\widgets\Main\AdsWidget::widget(); ?>
                <!--Advertisement END-->
            </aside>
        </div>
    </div>

    <!--Video post-->
        <?= \frontend\widgets\Blog\VideoNewsWidget::widget(['limit' => 5, 'category_id' => 5]); ?>
    <!--Video post END-->

    <div class="container more-posts">
        <h3 class="heading-1"><span><?= Yii::t('app', 'You may also like')?></span></h3>
        <div class="row">
            <!--Item-->
            <?= \frontend\widgets\Blog\AlsoNewsWidget::widget(['limit' => 3, 'category_id' => 2]); ?>
            <!--Item END-->
        </div>
    </div>

<?php $this->endContent() ?>