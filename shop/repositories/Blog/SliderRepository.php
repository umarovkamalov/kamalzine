<?php

namespace shop\repositories\Blog;

use shop\entities\Blog\Slider;
use shop\repositories\NotFoundException;

class SliderRepository
{
    public function get($id): Slider
    {
        if (!$slider = Slider::findOne($id)) {
            throw new NotFoundException('Slider is not found.');
        }
        return $slider;
    }

    public function save(Slider $slider): void
    {
        if (!$slider->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Slider $slider): void
    {
        if (!$slider->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}