<?php

namespace frontend\widgets\Blog;

use shop\readModels\Blog\PostReadRepository;
use shop\readModels\Shop\ProductReadRepository;
use yii\base\Widget;

class BlogSliderWidget extends Widget
{
    public $limit;

    private $repository;

    public function __construct(ProductReadRepository $repository, $config = [])
    {
        parent::__construct($config);
        $this->repository = $repository;
    }

    public function run(): string
    {
        return $this->render('_blog_slider', [
            'products' => $this->repository->getProductSlider($this->limit),
            'curs' => $this->repository->ratingUSD()
        ]);
    }
}