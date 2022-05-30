<?php

namespace frontend\widgets\Blog;

use shop\readModels\Blog\PostReadRepository;
use yii\base\Widget;

class AlsoNewsWidget extends Widget
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
        return $this->render('_alsonews', [
            'posts' => $this->repository->getTopNews($this->limit, $this->category_id)
        ]);
    }
}