<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AccessAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'node_modules/mdi/css/materialdesignicons.css',
        'node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css',
        'css/style.css',
    ];
    public $js = [
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/popper.js/dist/umd/popper.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'js/hoverable-collapse.js',
        'js/off-canvas.js',
        'js/misc.js',
        'js/chart.js',
    ];
    public $depends = [

    ];
}
