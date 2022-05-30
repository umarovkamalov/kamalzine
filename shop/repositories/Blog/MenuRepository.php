<?php

namespace shop\repositories\Blog;

use shop\entities\Blog\Menu;
use shop\repositories\NotFoundException;

class MenuRepository
{
    public function get($id): Menu
    {
        if (!$menu = Menu::findOne($id)) {
            throw new NotFoundException('Category is not found.');
        }
        return $menu;
    }

    public function save(Menu $menu): void
    {
        if (!$menu->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Menu $menu): void
    {
        if (!$menu->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}