<?php

namespace frontend\widgets\Main;


use shop\entities\Blog\Slider;
use yii\base\Widget;

class SliderWidget extends Widget
{

    public function run(): string
    {
        $slider = Slider::find()->where(['status' => 1])->limit(1)->all();
        return $this->render('_slider', ['slider' => $slider]);
    }
}