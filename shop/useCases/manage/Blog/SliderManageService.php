<?php

namespace shop\useCases\manage\Blog;

use shop\entities\Blog\Slider;
use shop\forms\manage\Blog\SliderForm;
use shop\repositories\Blog\SliderRepository;
use yii\helpers\VarDumper;

class SliderManageService
{
    private $sliders;


    public function __construct(SliderRepository $slider)
    {
        $this->sliders = $slider;
    }

    public function create(SliderForm $form): Slider
    {
        $slider = Slider::create(
            $form->type,
            $form->url
        );
        if ($form->photo) {
            $slider->setPhoto($form->photo);
        }

        $this->sliders->save($slider);
        return $slider;
    }

    public function edit($id, SliderForm $form): void
    {
        $slider = $this->sliders->get($id);

        $slider->edit(
            $form->type,
            $form->url
        );

        if ($form->photo) {
            $slider->setPhoto($form->photo);
        }
        $this->sliders->save($slider);
    }

    public function activate($id): void
    {
        $slider = $this->sliders->get($id);
        $slider->activate();
        $this->sliders->save($slider);
    }

    public function draft($id): void
    {
        $slider = $this->sliders->get($id);
        $slider->draft();
        $this->sliders->save($slider);
    }

    public function remove($id): void
    {
        $slider = $this->sliders->get($id);
        $this->sliders->remove($slider);
    }
}