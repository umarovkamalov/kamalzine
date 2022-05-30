<?php

namespace shop\repositories\Blog;

use shop\entities\Blog\Tag;
use shop\repositories\NotFoundException;

class TagRepository
{
    public function get($id): Tag
    {
        if (!$tag = Tag::findOne($id)) {
            throw new NotFoundException('Tag is not found.');
        }
        return $tag;
    }

    public function findByName($name): ?Tag
    {
        $mas = Tag::find()->select('*')
            ->innerJoin(
                'blog_tag_translations',
                'blog_tags.id = blog_tag_translations.tag_id'
            )
            ->andWhere(['in', 'blog_tag_translations.name',$name])
            ->asArray()
            ->one();
        return Tag::findOne(['id' => $mas]);
    }

    public function save(Tag $tag): void
    {
        if (!$tag->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Tag $tag): void
    {
        if (!$tag->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}