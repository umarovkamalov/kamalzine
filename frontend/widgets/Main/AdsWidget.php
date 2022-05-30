<?php

namespace frontend\widgets\Main;


use shop\entities\Blog\Ads;
use yii\base\Widget;

class AdsWidget extends Widget
{

    public function run(): string
    {
        $ads = Ads::find()->where(['status' => 1])->limit(1)->all();
        return $this->render('_ads', ['ads' => $ads]);
    }
}