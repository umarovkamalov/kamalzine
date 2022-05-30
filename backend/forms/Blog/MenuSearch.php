<?php

namespace backend\forms\Blog;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use shop\entities\Blog\Menu;

class MenuSearch extends Model
{
    public $id;
    public $icon;
    public $url;

    public function rules(): array
    {
        return [
            [['id'], 'integer'],
            [['icon', 'url'], 'safe'],
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search(array $params): ActiveDataProvider
    {
        $query = Menu::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['sort' => SORT_ASC]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
