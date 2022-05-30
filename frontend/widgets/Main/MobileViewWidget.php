<?php

namespace frontend\widgets\Main;


use shop\entities\Blog\Menu;
use yii\base\Widget;

class MobileViewWidget extends Widget
{
    public function run(): string
    {
        $menu = Menu::find()->where(['status' => 1])->orderBy('sort')->all();
        return $this->render('_mobile-view', ['menu' => $menu]);
    }
}