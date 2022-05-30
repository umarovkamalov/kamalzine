<?php
use yii\helpers\Url;
$urlRoute = Yii::$app->controller->getRoute();
$arr = [
    1=>'shop/category/index',
    2=>'shop/brand/index',
    3=>'shop/tag/index',
    4=>'shop/characteristic/index',
    5=>'shop/delivery/index',
    6=>'shop/product/index'
];
$arr2 = [
    7=>'blog/post/index',
    8=>'blog/comment/index',
    9=>'blog/tag/index',
    10=>'blog/category/index',
    11=>'blog/slider/index',
    11=>'blog/advertising/index',
];
$arr3 = [
    12=>'page/index',
    13=>'file/index',
];

$one = array_search( $urlRoute, $arr ); //bool
$one2 = array_search( $urlRoute, $arr2 ); //bool
$one3 = array_search( $urlRoute, $arr3 ); //bool
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!--main pages start-->
        <li class="nav-item nav-category">
            <span class="nav-link"><?= Yii::t('app', 'General')?> </span>
        </li>
        <li class="nav-item <?php if($one2){echo "active";}?>">
            <a class="nav-link" data-toggle="collapse" href="#layoutsSubmenu" aria-expanded="<?php if($one2){echo "true";}else{echo "false";}?>" aria-controls="collapseExample">
                <i class="mdi mdi-arrow-expand-all"></i>
                <span class="menu-title"><?= Yii::t('app', 'Blog')?> </span>
                <i class="mdi mdi-chevron-down"></i>
            </a>
            <div class="collapse <?php if($one2){echo "show";}?>" id="layoutsSubmenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link <?php if($urlRoute=="blog/menu/index"){echo "active";}?>" href="<?=Url::to(['/blog/menu/index'])?>"><?= Yii::t('app', 'Menu')?> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($urlRoute=="blog/slider/index"){echo "active";}?>" href="<?=Url::to(['/blog/slider/index'])?>"><?= Yii::t('app', 'Slider')?> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($urlRoute=="blog/advertisement/index"){echo "active";}?>" href="<?=Url::to(['/blog/ads/index'])?>"><?= Yii::t('app', 'Реклама')?> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($urlRoute=="blog/post/index"){echo "active";}?>" href="<?=Url::to(['/blog/post/index'])?>"><?= Yii::t('app', 'News')?> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($urlRoute=="blog/comment/index"){echo "active";}?>" href="<?=Url::to(['/blog/comment/index'])?>"><?= Yii::t('app', 'Comments')?>  </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($urlRoute=="blog/tag/index"){echo "active";}?>" href="<?=Url::to(['/blog/tag/index'])?>"><?= Yii::t('app', 'Tags')?> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($urlRoute=="blog/category/index"){echo "active";}?>" href="<?=Url::to(['/blog/category/index'])?>"><?= Yii::t('app', 'Categories')?> </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item <?php if($one3){echo "active";}?>">
            <a class="nav-link" data-toggle="collapse" href="#sidebarLayoutsSubmenu" aria-expanded="<?php if($one3){echo "true";}else{echo "false";}?>" aria-controls="collapseExample">
                <i class="mdi mdi-format-list-bulleted"></i>
                <span class="menu-title"><?= Yii::t('app', 'Content')?> </span>
                <i class="mdi mdi-chevron-down"></i>
            </a>
            <div class="collapse <?php if($one3){echo "show";}?>" id="sidebarLayoutsSubmenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link <?php if($urlRoute=="page/index"){echo "active";}?>" href="<?=Url::to(['/page/index'])?>"><?= Yii::t('app', 'Pages')?> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($urlRoute=="file/index"){echo "active";}?>" href="<?=Url::to(['/file/index'])?>"><?= Yii::t('app', 'Files')?> </a>
                    </li>
                </ul>
            </div>
        </li>
        <!--main pages end-->

    </ul>
</nav>

