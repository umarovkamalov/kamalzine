<?php

namespace shop\readModels\Blog;

use Elasticsearch\Client;
use shop\entities\Blog\Menu;
use shop\readModels\Blog\views\MenuView;
use yii\helpers\ArrayHelper;

class MenuReadRepository
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getRoot(): Menu
    {
        return Menu::find()->roots()->one();
    }

    /**
     * @return Menu[]
     */
    public function getAll(): array
    {
        return Menu::find()->andWhere(['>', 'sort', 0])->orderBy('lft')->all();
    }

    public function find($id): ?Menu
    {
        return Menu::find()->andWhere(['id' => $id])->andWhere(['>', 'sort', 0])->one();
    }

    public function findByUrl($url): ? Menu
    {
        return Menu::find()->andWhere(['url' => $url])->andWhere(['>', 'sort', 0])->one();
    }

    public function getTreeWithSubsOf(Menu $category = null): array
    {
        $query = Menu::find()->andWhere(['>', 'sort', 0])->orderBy('lft');

        if ($category) {
            $criteria = ['or', ['sort' => 1]];
            foreach (ArrayHelper::merge([$category], $category->parents) as $item) {
                $criteria[] = ['and', ['>', 'lft', $item->lft], ['<', 'rgt', $item->rgt], ['sort' => $item->sort + 1]];
            }
            $query->andWhere($criteria);
        } else {
            $query->andWhere(['sort' => 1]);
        }

        $aggs = $this->client->search([
            'index' => 'index_sportgazeta',
            'type' => 'products',
            'body' => [
                'size' => 0,
                'aggs' => [
                    'group_by_category' => [
                        'terms' => [
                            'field' => 'menu',
                        ]
                    ]
                ],
            ],
        ]);

        $counts = ArrayHelper::map($aggs['aggregations']['group_by_category']['buckets'], 'key', 'doc_count');

        return array_map(function (Menu $category) use ($counts) {
            return new MenuView($category, ArrayHelper::getValue($counts, $category->id, 0));
        }, $query->all());
    }
}