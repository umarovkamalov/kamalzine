<?php

namespace shop\readModels\Blog\views;

use shop\entities\Blog\Menu;

class MenuView
{
    public $menu;

    public function __construct(Menu $category)
    {
        $this->category = $category;
    }
}