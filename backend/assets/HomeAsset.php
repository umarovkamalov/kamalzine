<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class HomeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

    ];
    public $js = [
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/chart.js/dist/Chart.min.js',
    ];
    public $depends = [

    ];
}
