<?php

namespace shop\readModels\Blog;

use shop\entities\Blog\Tag;

class TagReadRepository
{
    public function findBySlug($slug): ?Tag
    {
        return Tag::findOne(['slug' => $slug]);
    }
    public function getAll(): array
    {
        return Tag::find()->orderBy('id')->all();
    }

    public function find($id): ?Tag
    {
        return Tag::findOne($id);
    }

}
