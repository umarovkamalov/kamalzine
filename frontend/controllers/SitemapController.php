<?php

namespace frontend\controllers;

use shop\entities\Blog\Category as BlogCategory;
use shop\entities\Blog\Post\Post;
use shop\entities\Page;
use shop\readModels\Blog\PostReadRepository;
use shop\readModels\Blog\CategoryReadRepository as BlogCategoryReadRepository;
use shop\readModels\PageReadRepository;
use shop\services\sitemap\IndexItem;
use shop\services\sitemap\MapItem;
use shop\services\sitemap\Sitemap;
use yii\caching\Dependency;
use yii\caching\TagDependency;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;

class SitemapController extends Controller
{
    const ITEMS_PER_PAGE = 100;

    private $sitemap;
    private $pages;
    private $blogCategories;
    private $posts;

    public function __construct(
        $id,
        $module,
        Sitemap $sitemap,
        PageReadRepository $pages,
        BlogCategoryReadRepository $blogCategories,
        PostReadRepository $posts,
        $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->sitemap = $sitemap;
        $this->pages = $pages;
        $this->blogCategories = $blogCategories;
        $this->posts = $posts;
    }

    public function actionIndex(): Response
    {
        return $this->renderSitemap('sitemap-index', function () {
            return $this->sitemap->generateIndex([
                new IndexItem(Url::to(['pages'], true)),
                new IndexItem(Url::to(['blog-categories'], true)),
                new IndexItem(Url::to(['blog-posts-index'], true)),
            ]);
        });
    }

    public function actionPages(): Response
    {
        return $this->renderSitemap('sitemap-pages', function () {
            return $this->sitemap->generateMap(array_map(function (Page $page) {
                return new MapItem(
                    Url::to(['/page/view', 'id' => $page->id], true),
                    null,
                    MapItem::WEEKLY
                );
            }, $this->pages->getAll()));
        });
    }

    public function actionBlogCategories(): Response
    {
        return $this->renderSitemap('sitemap-blog-categories', function () {
            return $this->sitemap->generateMap(array_map(function (BlogCategory $category) {
                return new MapItem(
                    Url::to(['/blog/posts/category', 'slug' => $category->slug], true),
                    null,
                    MapItem::WEEKLY
                );
            }, $this->blogCategories->getAll()));
        });
    }

    public function actionBlogPostsIndex(): Response
    {
        return $this->renderSitemap('sitemap-blog-posts-index', function (){
            return $this->sitemap->generateIndex(array_map(function ($start) {
                return new IndexItem(Url::to(['blog-posts', 'start' => $start * self::ITEMS_PER_PAGE], true));
            }, range(0, (int)($this->posts->count() / self::ITEMS_PER_PAGE))));
        });
    }

    public function actionBlogPosts($start = 0): Response
    {
        return $this->renderSitemap(['sitemap-blog-posts', $start], function () use ($start) {
            return $this->sitemap->generateMap(array_map(function (Post $post) {
                return new MapItem(
                    Url::to(['/blog/post/post', 'id' => $post->id], true),
                    null,
                    MapItem::DAILY
                );
            }, $this->posts->getAllByRange($start, self::ITEMS_PER_PAGE)));
        });
    }



    private function renderSitemap($key, callable $callback, Dependency $dependency = null): Response
    {
        return \Yii::$app->response->sendContentAsFile(\Yii::$app->cache->getOrSet($key, $callback, null, $dependency), Url::canonical(), [
            'mimeType' => 'application/xml',
            'inline' => true
        ]);
    }
}