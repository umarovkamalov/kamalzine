<?php

namespace shop\readModels\Blog;

use yii\helpers\VarDumper;
use shop\entities\Blog\Category;
use shop\entities\Blog\Post\Post;
use shop\entities\Blog\Tag;
use shop\entities\Shop\Product\Product;
use yii\data\ActiveDataProvider;
use yii\data\DataProviderInterface;
use yii\db\ActiveQuery;

class PostReadRepository
{
    public function count(): int
    {
        return Post::find()->active()->count();
    }

    public function getAllByRange($offset, $limit): array
    {
        return Post::find()->active()->orderBy(['id' => SORT_ASC])->limit($limit)->offset($offset)->all();
    }

    public function getAll(): DataProviderInterface
    {
        $query = Post::find()->active()->with('category');
        return $this->getProvider($query);
    }

    public function getAllByCategory(Category $category): DataProviderInterface
    {
        $query = Post::find()->active()->andWhere(['category_id' => $category->id])->with('category');
        return $this->getProvider($query);
    }

    public function getAllByTag(Tag $tag): DataProviderInterface
    {
        $query = Post::find()->alias('p')->active('p')->with('category');
        $query->joinWith(['tagAssignments ta'], false);
        $query->andWhere(['ta.tag_id' => $tag->id]);
        $query->groupBy('p.id');
        return $this->getProvider($query);
    }

    public function getLast($limit): array
    {
        return Post::find()->with('category')->orderBy(['id' => SORT_DESC])->limit($limit)->all();
    }

    public function getNews($limit): array
    {
        return Post::find()->with('category')->orderBy(['id' => SORT_DESC])->limit($limit)->all();
    }

    public function getTopNews($limit, $category_id = null): array
    {
        return Post::find()
            ->with('category')
            ->orderBy(['rand()' => SORT_DESC])
            ->limit($limit)
            ->all();
    }

    public function getAlsoNews($limit, $category_id): array
    {
        return Post::find()->where(['category_id' => $category_id])->with('category')->orderBy(['id' => SORT_DESC])->limit($limit)->all();
    }

    public function getImagesNews($limit, $category_id): array
    {
        return Post::find()->where(['category_id' => $category_id])->with('category')->orderBy(['id' => SORT_DESC])->limit($limit)->all();
    }


    public function getPopularNews($limit): array
    {   
            return Post::find()
            ->select(['COUNT(*) as MatchCount,  `*`'])
            ->leftJoin('post_logs', 'post_logs.post_id = blog_posts.id')
            ->leftJoin('blog_post_translations', 'blog_post_translations.post_id = blog_posts.id')
            ->andWhere(['in', 'post_logs.cat_id', 0 ])
            ->groupBy('post_logs.post_id')
            ->orderBy('MatchCount DESC')
            ->limit($limit)
            ->asArray()
            ->all();

    }

    public function getPhotoNews($limit, $category_id): array
    {
        return Post::find()->where(['category_id' => $category_id])->with('category')->orderBy(['id' => SORT_DESC])->limit($limit)->all();
    }


    public function getFireTopNews($limit, $category_id): array
    {
        return Post::find()->where(['category_id' => $category_id])->with('category')->orderBy(['id' => SORT_DESC])->limit($limit)->all();
    }

    public function getShortNews($limit, $category_id): array
    {
        return Post::find()->where(['category_id' => $category_id])->with('category')->orderBy(['id' => SORT_DESC])->limit($limit)->all();
    }

    public function getRandomNews($limit, $category_id): array
    {
        return Post::find()->where(['category_id' => $category_id])->with('category')->orderBy(['id' => SORT_DESC])->limit($limit)->all();
    }

    public function getVideoNews($limit, $category_id): array
    {
        return Post::find()->where(['category_id' => $category_id])->with('category')->orderBy(['comments_count' => SORT_DESC])->limit($limit)->all();
    }

    public function find($id): ?Post
    {
        return Post::find()->active()->andWhere(['id' => $id])->one();
    }

    private function getProvider(ActiveQuery $query): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => $query,
            'sort' => false,
        ]);
    }
    
}