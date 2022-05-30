<?php

namespace shop\useCases\manage\Blog;

use shop\entities\Blog\Ads;
use shop\forms\manage\Blog\AdsForm;
use shop\repositories\Blog\AdsRepository;
use yii\helpers\VarDumper;

class AdsManageService
{
    private $ads;


    public function __construct(adsRepository $ads)
    {
        $this->ads = $ads;
    }

    public function create(AdsForm $form): Ads
    {
        $ads = Ads::create(
            $form->type,
            $form->url
        );
        if ($form->photo) {
            $ads->setPhoto($form->photo);
        }

        $this->ads->save($ads);
        return $ads;
    }

    public function edit($id, AdsForm $form): void
    {
        $ads = $this->ads->get($id);

        $ads->edit(
            $form->type,
            $form->url
        );

        if ($form->photo) {
            $ads->setPhoto($form->photo);
        }
        $this->ads->save($ads);
    }

    public function activate($id): void
    {
        $ads = $this->ads->get($id);
        $ads->activate();
        $this->ads->save($ads);
    }

    public function draft($id): void
    {
        $ads = $this->ads->get($id);
        $ads->draft();
        $this->ads->save($ads);
    }

    public function remove($id): void
    {
        $ads = $this->ads->get($id);
        $this->ads->remove($ads);
    }
}