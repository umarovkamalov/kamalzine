<?php

namespace frontend\widgets\Blog;

use shop\entities\Blog\Tag;
use shop\entities\Blog\Post\Post;
use shop\readModels\Blog\TagReadRepository;
use yii\base\Widget;
use yii\helpers\Html;

class TagWidget extends Widget
{
    public $active;

    private $tags;

    public function __construct(TagReadRepository $tags, $config = [])
    {
        parent::__construct($config);
        $this->tags = $tags;
    }

    public function run(): string
    {
        return Html::tag('ul', implode(PHP_EOL, array_map(function (Tag $tag) {
            $active = $this->active && ($this->active->id == $tag->id);
            return
                Html::beginTag('li').
                Html::beginTag('a').
                Html::endTag('a').
                Html::a(
                    Html::encode($tag->name),
                    ['/blog/post/tag', 'slug' => $tag->slug],
                    ['class' => $active ? 'active' : '']
                ).Html::endTag('li');
        }, $this->tags->getAll())), [
            'class' => 'tags',
        ]);
    }
}