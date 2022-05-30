<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/font-awesome/css/font-awesome.min.css',
        'css/ts.css',
        'js/slick/slick.css',
        'js/lity/lity.min.css',
        'css/style.css?1',
    ];
    public $js = [
        'js/jquery.min.js',
        'js/slick/slick.min.js',
        'js/socialShare.min.js',
        'js/jquery.simpleWeather.min.js',
        'js/lity/lity.min.js',
        'js/main.js',
        'js/mc/jquery.ketchup.all.min.js',
        'js/mc/main.js',
        'js/tweecool.min.js',
        'js/fingerprint2.min.js',
    ];
    public $depends = [
    ];
}
