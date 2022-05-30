<?php

namespace console\controllers;

use Yii;
use yii\caching\TagDependency;
use yii\console\Controller;

class CacheController extends Controller
{
    public function actionIndex(): void
    {
        if(TagDependency::invalidate(Yii::$app->cache, 'categories')){
            echo "Success";
        }else{
            echo "Error";
        }

    }
}