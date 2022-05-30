<?php

namespace frontend\widgets\Shop;

use shop\entities\Shop\menu;
use shop\readModels\Blog\MenuReadRepository;
use shop\readModels\Shop\views\menuView;
use yii\base\Widget;
use yii\helpers\Html;

class MenuWidget extends Widget
{
    /** @var menu|null */
    public $active;

    private $categories;

    public function __construct(MenuReadRepository $categories, $config = [])
    {
        parent::__construct($config);
        $this->categories = $categories;
    }

    public function run(): string
    {
        return Html::tag('ul', implode(PHP_EOL, array_map(function (menuView $view) {
            $indent = ($view->menu->depth > 1 ? str_repeat('&nbsp;&nbsp;&nbsp;', $view->menu->depth - 1) . '- ' : '');
            $active = $this->active && ($this->active->id == $view->menu->id || $this->active->isChildOf($view->menu));
            return
                Html::beginTag('li').
                Html::a(
                    $indent . Html::encode($view->menu->name) . '&nbsp;<span class="count-product pull-right">' . $view->count . '</span>',
                    ['/blog/catalog/menu', 'id' => $view->menu->id],
                    ['class' => $active ? ' active' : '']
                ).
                Html::endTag('li');
        }, $this->categories->getTreeWithSubsOf($this->active))));
    }
}