<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'node_modules/mdi/css/materialdesignicons.css',
        'node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css',
        'bower_components/lightgallery/dist/css/lightgallery.min.css',
        'node_modules/icheck/skins/all.css',
        'css/style.css',
        'css/site.css',
        'bower_components/themify-icons/css/themify-icons.css',
    ];
    public $js = [
        'node_modules/popper.js/dist/umd/popper.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js',
        'bower_components/lightgallery/dist/js/lightgallery-all.min.js',
        'node_modules/icheck/icheck.min.js',
        'js/iCheck.js',
        'js/off-canvas.js',
        'js/hoverable-collapse.js',
        'js/misc.js',
        'js/chart.js',
        'js/light-gallery.js',
    ];
    public $depends = [

    ];
}
