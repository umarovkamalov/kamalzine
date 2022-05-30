<?php

namespace frontend\widgets\Blog;

use shop\readModels\Blog\PostReadRepository;
use yii\base\Widget;

class RandomNewsWidget extends Widget
{
    public $limit;
    public $category_id;

    private $repository;

    public function __construct(PostReadRepository $repository, $config = [])
    {
        parent::__construct($config);
        $this->repository = $repository;
    }

    public function run(): string
    {
        return $this->render('_randomnews', [
            'posts' => $this->repository->getRandomNews($this->limit, $this->category_id)
        ]);
    }
}