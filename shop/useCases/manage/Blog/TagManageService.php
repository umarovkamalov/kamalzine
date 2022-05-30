<?php

namespace shop\useCases\manage\Blog;

use shop\entities\Blog\Tag;
use shop\forms\manage\Blog\TagForm;
use shop\repositories\Blog\TagRepository;

class TagManageService
{
    private $tags;

    public function __construct(TagRepository $tags)
    {
        $this->tags = $tags;
    }

    public function create(TagForm $form): Tag
    {
        $tag = Tag::create(
            $form->slug
        );

        foreach ($form->translations as $translation) {
            $tag->setTranslation($translation->lang_id, $translation->name);
        }
        $this->tags->save($tag);
        return $tag;
    }

    public function edit($id, TagForm $form): void
    {
        $tag = $this->tags->get($id);
        $tag->edit(
            $form->slug
        );

        foreach ($form->translations as $translation) {
            $tag->setTranslation($translation->lang_id, $translation->name);
        }
        $this->tags->save($tag);
    }

    public function remove($id): void
    {
        $tag = $this->tags->get($id);
        $this->tags->remove($tag);
    }
}