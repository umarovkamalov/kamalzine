<?php

namespace frontend\widgets\Blog;
use shop\entities\Blog\Post\Post;
use shop\readModels\Blog\PostReadRepository;
use yii\base\Widget;
use yii\helpers\VarDumper;

class PopularNewsWidget extends Widget
{
    public $limit;

    private $repository;

    public function __construct(PostReadRepository $repository, $config = [])
    {
        parent::__construct($config);
        $this->repository = $repository;
    }

    public function run(): string
    {
        return $this->render('_popularnews', [
            'posts' => $this->repository->getPopularNews($this->limit),
            'postclass'=> new Post()
        ]);
    }
}