<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\widgets\Shop\CategoriesWidget;
use yii\helpers\Url;

$brands = \shop\entities\Shop\Brand::find()->all();
$curs = \shop\readModels\Shop\ProductReadRepository::ratingUSD();
$max = \shop\readModels\Shop\ProductReadRepository::getMaxRange();
?>
<?php $this->beginContent('@frontend/views/layouts/main.php') ?>
<div id="main-content">
    <div class="main-content">
        <div class="page-cata">
            <div class="row">
                <div id="sidebar" class="col-md-3 left-column-container sidebar hidden-sm hidden-xs">
                    <!-- Begin Categories -->
                    <div class="sb-categories">
                        <div class="sb-widget">
                            <h4 class="sb-title"><?= Yii::t('app', 'Categories')?> </h4>
                                <?= CategoriesWidget::widget([
                                    'active' => $this->params['active_category'] ?? null
                                ]) ?>
                        </div>
                    </div>
                    <!-- End Categories -->
                    <!-- Begin Price Range -->
                    <div class="price-range-slider">
                        <div class="sb-widget">
                            <h4 class="sb-title"><?= Yii::t('app', 'Price Range')?> </h4>
                            <div class="price-range">
                                <p>
                                    <label><?= Yii::t('app', 'Range')?>: </label>
                                    <span type="text" id="amount" style="font-weight: bold;">
                                        <span class="min-val"><span class="money" data-currency-usd="$0" data-currency="UZS">0 UZS</span></span> -
                                        <span class="max-val"><span class="money" data-currency-usd="$<?= round($max/$curs); ?>" data-currency="UZS"><?= $max; ?> UZS</span></span></span>
                                </p>
                                <div id="range-slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all" style="width: 100%; left: 0%;"></div>
                                    <div class="range-left"><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span></div>
                                    <div class="range-right"><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 100%;"></span></div>
                                </div>
                                <div id="slider"></div>
                            </div>
                        </div>
                    </div>
                    <!-- End Price Range -->
                    <div class="sb-widget sb-filter-wrapper">
                        <div class="sbw-filter">
                            <div class="grid-uniform">
                                <div class="sb-widget sb-filter brand" id="filter-1">
                                    <div class="sbf-title">
                                                <span><?= Yii::t('app', 'Brands')?>
                                                <i class="fa fa-angle-down visible-xs"></i>
                                                <i class="fa fa-angle-up visible-xs"></i>
                                                </span>
                                        <a href="#" class="clear-filter hidden hide" id="clear-filter-1" style="float: right;">Clear </a>
                                    </div>
                                    <ul class="advanced-filters">
                                        <?php foreach ($brands as $brand):?>
                                        <li class="advanced-filter rt" data-group="Brand">
                                            <a href="<?= Url::toRoute(['/shop/catalog/brand', 'id'=>$brand->id])?>" title="<?=$brand->name; ?>"><?=$brand->name; ?> </a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <!--<div class="sb-widget sb-filter color" id="filter-2">
                                    <div class="sbf-title">
                                                <span><?/*= Yii::t('app', 'Color')*/?>
                                                <i class="fa fa-angle-down visible-xs"></i>
                                                <i class="fa fa-angle-up visible-xs"></i>
                                                </span>
                                        <a href="#" class="clear-filter hidden hide" id="clear-filter-2" style="float: right;">Clear </a>
                                    </div>
                                    <ul class="advanced-filters list-inline afs-color">
                                        <li class="advanced-filter af-color" data-group="Color" style="background-color:black; background-image: url(../../cdn.sportgazeta.uz/s/files/1/1836/0759/t/2/assets/black_f5e54ba6.png);">
                                            <a href="" title="Black"></a>
                                        </li>
                                        <li class="advanced-filter af-color" data-group="Color" style="background-color:blue; background-image: url(../../cdn.sportgazeta.uz/s/files/1/1836/0759/t/2/assets/blue_f5e54ba6.png);">
                                            <a href="#" title="Blue"></a>
                                        </li>
                                        <li class="advanced-filter af-color" data-group="Color" style="background-color:brown; background-image: url(../../cdn.sportgazeta.uz/s/files/1/1836/0759/t/2/assets/brown_f5e54ba6.png);">
                                            <a href="#" title="Brown"></a>
                                        </li>
                                        <li class="advanced-filter af-color" data-group="Color" style="background-color:gold; background-image: url(../../cdn.sportgazeta.uz/s/files/1/1836/0759/t/2/assets/gold_f5e54ba6.png);">
                                            <a href="#" title="Gold"></a>
                                        </li>
                                        <li class="advanced-filter af-color" data-group="Color" style="background-color:grey; background-image: url(../../cdn.sportgazeta.uz/s/files/1/1836/0759/t/2/assets/grey_f5e54ba6.png);">
                                            <a href="#" title="Grey"></a>
                                        </li>
                                        <li class="advanced-filter af-color" data-group="Color" style="background-color:pink; background-image: url(../../cdn.sportgazeta.uz/s/files/1/1836/0759/t/2/assets/pink_f5e54ba6.png);">
                                            <a href="#" title="Pink"></a>
                                        </li>
                                        <li class="advanced-filter af-color" data-group="Color" style="background-color:red; background-image: url(../../cdn.sportgazeta.uz/s/files/1/1836/0759/t/2/assets/red_f5e54ba6.png);">
                                            <a href="#" title="Red"></a>
                                        </li>
                                        <li class="advanced-filter af-color" data-group="Color" style="background-color:white; background-image: url(../../cdn.sportgazeta.uz/s/files/1/1836/0759/t/2/assets/white_f5e54ba6.png);">
                                            <a href="#" title="White"></a>
                                        </li>
                                        <li class="advanced-filter af-color" data-group="Color" style="background-color:yellow; background-image: url(../../cdn.sportgazeta.uz/s/files/1/1836/0759/t/2/assets/yellow_f5e54ba6.png);">
                                            <a href="#" title="Yellow"></a>
                                        </li>
                                    </ul>
                                </div>-->
                                <div class="sb-widget sb-filter price" id="filter-3">
                                    <div class="sbf-title">
                                                <span><?= Yii::t('app', 'Price')?>
                                                <i class="fa fa-angle-down visible-xs"></i>
                                                <i class="fa fa-angle-up visible-xs"></i>
                                                </span>
                                        <a href="#" class="clear-filter hidden hide" id="clear-filter-3" style="float: right;"><?= Yii::t('app','Clear')?> </a>
                                    </div>
                                    <ul class="advanced-filters">
                                        <li class="advanced-filter rt" data-group="Price">
                                            <a href="#" title="Narrow selection to products matching tag Price_$100-$300">от 0 UZS - до 1 mln UZS </a>
                                        </li>
                                        <li class="advanced-filter rt" data-group="Price">
                                            <a href="#" title="Narrow selection to products matching tag Price_Above $300">от 1 mln UZS - до 5 mln UZS</a>
                                        </li>
                                        <li class="advanced-filter rt" data-group="Price">
                                            <a href="#" title="Narrow selection to products matching tag Price_Under $100">от 5 mln UZS - ~</a>
                                        </li>
                                    </ul>
                                </div>
                                <!--<div class="sb-widget sb-filter size" id="filter-4">
                                    <div class="sbf-title">
                                                <span><?/*= Yii::t('app', 'Size')*/?>
                                                <i class="fa fa-angle-down visible-xs"></i>
                                                <i class="fa fa-angle-up visible-xs"></i>
                                                </span>
                                        <a href="#" class="clear-filter hidden hide" id="clear-filter-4" style="float: right;"><?/*= Yii::t('app', 'Clear')*/?> </a>
                                    </div>
                                    <ul class="advanced-filters">
                                        <li class="advanced-filter rt" data-group="Size">
                                            <a href="#" title="Narrow selection to products matching tag Size_L">L </a>
                                        </li>
                                        <li class="advanced-filter rt" data-group="Size-m">
                                            <a href="#" title="Narrow selection to products matching tag Size_M">M </a>
                                        </li>
                                        <li class="advanced-filter rt" data-group="Size-x">
                                            <a href="#" title="Narrow selection to products matching tag Size_X">X </a>
                                        </li>
                                        <li class="advanced-filter rt" data-group="Size-xl">
                                            <a href="#" title="Narrow selection to products matching tag Size_XL">XL </a>
                                        </li>
                                    </ul>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <!-- Begin Banner -->
                    <div class="sb-widget sb-banner hidden-xs hidden-sm">
                        <h4 class="sb-title">Партнеры </h4>
                        <a href="#">
                            <img src="/img/contribution-sample.png" alt="" />
                        </a>
                    </div>
                    <!-- End Banner -->
                </div>
                <div id="content" class="col-md-9">
                    <div id="col-main">

                    <?= $content ?>
                    </div>
                </div>
            </div>
        </div>
        <script>
            jQuery(document).ready(function($) {
                AT_Main.callPriceSlider();
            })
        </script>
    </div>
</div>
<!-- End Main Content -->

<?php $this->endContent() ?>
