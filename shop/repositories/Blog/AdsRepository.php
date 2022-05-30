<?php

namespace shop\repositories\Blog;

use shop\entities\Blog\Ads;
use shop\repositories\NotFoundException;

class adsRepository
{
    public function get($id): Ads
    {
        if (!$ads = Ads::findOne($id)) {
            throw new NotFoundException('Ads is not found.');
        }
        return $ads;
    }

    public function save(Ads $ads): void
    {
        if (!$ads->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Ads $ads): void
    {
        if (!$ads->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}