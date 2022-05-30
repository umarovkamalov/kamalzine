<?php

namespace shop\useCases\manage\Blog;

use shop\entities\Blog\Menu;
use shop\forms\manage\Blog\MenuForm;
use shop\repositories\Blog\MenuRepository;

class MenuManageService
{
    private $menu;


    public function __construct(MenuRepository $menu)
    {
        $this->menu = $menu;
    }

    public function create(MenuForm $form): Menu
    {
        $menu = Menu::create(
            $form->type,
            $form->icon,
            $form->url
        );

        foreach ($form->translations as $translation) {
            $menu->setTranslation($translation->lang_id, $translation->name, $translation->title);
        }
        $this->menu->save($menu);
        return $menu;
    }

    public function edit($id, MenuForm $form): void
    {
        $menu = $this->menu->get($id);
        $menu->edit(
            $form->type,
            $form->icon,
            $form->url
        );

        foreach ($form->translations as $translation) {
            $menu->setTranslation($translation->lang_id, $translation->name, $translation->title);
        }
        $this->menu->save($menu);
    }

    public function activate($id): void
    {
        $product = $this->menu->get($id);
        $product->activate();
        $this->menu->save($product);
    }

    public function draft($id): void
    {
        $product = $this->menu->get($id);
        $product->draft();
        $this->menu->save($product);
    }

    public function remove($id): void
    {
        $menu = $this->menu->get($id);
        $this->menu->remove($menu);
    }
}