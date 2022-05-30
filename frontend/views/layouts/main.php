<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
    <link rel="shortcut icon" href="favicon.ico" type="images/png" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">

    <!-- HEADER / MENU -->
    <header class="header1 header-megamenu">
        <div class="topbar head_ways">
                <div class="row">
                    <div class="pull-left col-md-3 dropdown color-thema">
                        <?= \frontend\widgets\LanguageDropdown::widget(); ?>
                    </div>
                    <div class="col-md-6 col-sm-6 hidden-xs">
                        <div class="newsfeed">
                            <span><?= Yii::t('app', 'BREAKING')?>:</span>
                            <div class="news-carousel">
                                <!--Item-->
                                <?= \frontend\widgets\Blog\ShortNewsWidget::widget(['limit' => 4, 'category_id' => 2]); ?>
                                <!--Item END-->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 hidden-xs" style="margin-top: 9px;color:#fff;">
                        <span ><i class="fa fa fa-send"></i> <a style="color:#fff;" href="#">Telegram</a></span>
                        &nbsp;
                        <span><i class="fa fa-envelope"></i> <a style="color:#fff;" href="mailto:info@arislon.com">info@sportgazeta.uz</a></span>
                    </div>
                </div>
        </div>
        <div class="clearfix"></div>
        <div class="navbar-header padding-vertical-10">
            <div class="container">
                <a href="<?= Url::toRoute('@web/')?>" class="navbar-brand"><img src="<?= Url::to('@web/')?>images/logo.png" class="img-responsive" alt="logo"/></a>
                <!--slider begin--->
                <?= \frontend\widgets\Main\SliderWidget::widget(); ?>
                <!--slider end--->
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="container">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span><?= Yii::t('app', 'Navigation')?></span>
                <span class="fa fa-navicon"></span>
            </button>

            <div class="search-wrap2">
                <form method="get">
                    <input type="text" placeholder="<?= Yii::t('app', 'Search by typing')?>">
                    <div class="sw2-close"><span class="fa fa-close"></span></div>
                </form>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">

                    <?php echo \frontend\widgets\Main\NavMenuWidget::widget();?>

                    <li class="pull-right hidden-xs">
                        <div class="search-trigger search-trigger2"><i class="fa fa-search"></i></div>
                    </li>
                </ul>

            </div>
        </div>
    </header>
    <!-- // HEADER / MENU -->

    <!-- // PAGE HEADER -->
	<br>
	<br>
    <?= Alert::widget() ?>
    <?= $content ?>
    <!-- End Main Content -->

    <!-- Begin Footer -->
    <footer class="bg-dark footer1 padding-top-60">
        <div class="container">
            <div class="row margin-bottom-30">
                <div class="col-md-4 col-sm-4 margin-bottom-30 footer-info">
                    <a href="/" ><img src="<?= Url::to('@web/')?>images/flogo.png" class="img-responsive" alt="При копировании, распространении и ином использовании материалов с сайта sportgazeta.uz обязательно указание полного текста и ссылки на сайт в виде"/></a>
                    <p>© <?= Yii::t('app', 'At copying, distribution and other use of materials from a site sportgazeta.uz instructions of the full text and the reference to a site in a kind are obligatory')?>.</p>
                    <span><i class="fa fa-map-marker"></i> <?= Yii::t('app', 'Toshkent city, Yunusobod street')?></span>
                    <span><i class="fa fa-envelope"></i> <a href="mailto:info@arislon.com">info@sportgazeta.uz</a></span>
                    <!--<span><i class="fa fa-phone"></i> <a href="callto:+998712011234">+998(71) 201 12 34</a></span>-->
                </div>

                <div class="col-md-4 col-sm-4 margin-bottom-30">
                    <h5><?= Yii::t('app', 'Popular pages')?></h5>
                    <ul class="pages">
                        <li><a href="<?= Url::toRoute(['/about'])?>"><?= Yii::t('app', 'About Us')?></a></li>
                        <li><a href="<?= Url::toRoute(['/faq'])?>"><?= Yii::t('app', 'F.A.Q.')?></a></li>
                        <li><a href="<?= Url::toRoute(['/blog/news'])?>"><?= Yii::t('app', 'Popular News')?></a></li>
                        <li><a href="<?= Url::toRoute(['/blog/news'])?>"><?= Yii::t('app', 'Reсent News')?></a></li>
                    </ul>
                </div>

                <div class="col-md-4 col-sm-4 margin-bottom-30 footer-follow">
                    <h5><?= Yii::t('app', 'Follow')?></h5>
                    <div class="footer-newsletter">
                        <form action="" id="invite1" method="POST">
                            <i class="fa fa-envelope"></i>
                            <input type="email" placeholder="Email address" class="e-mail" name="email" id="address1" data-validate="validate(required, email)">
                            <button type="submit"><?= Yii::t('app', 'Subscribe')?></button>
                        </form>
                        <div id="result1"></div>
                    </div>
                    <br>
                    <div>
                        <ul class="pages">
                            <li><a href=""><i class="fa fa-facebook"></i> Facebook</a></li>
                            <li><a href=""><i class="fa fa-youtube-play"></i> Youtube</a></li>
                            <li><a href=""><i class="fa fa-instagram"></i> Instagram</a></li>
                            <li><a href=""><i class="fa fa-send"></i> Telegram</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- FOOTER COPYRIGHT -->
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <p style="text-align: center; color:#fff;">© Copyright 2018 Все права защищены. Разработано в: Perfect Premium Service. Tel. <a href="callto:+998998580564" style="color:#fff;">+998998580564</a> E-mail: achilov21@yandex.ru</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- // FOOTER -->
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
