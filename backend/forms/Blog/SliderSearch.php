<?php

namespace backend\forms\Blog;

use shop\entities\Blog\Slider;
use shop\helpers\SliderHelper;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class SliderSearch extends Model
{
    public $id;
    public $status;
    public $type;

    public function rules(): array
    {
        return [
            [['id', 'status', 'type',], 'integer'],
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search(array $params): ActiveDataProvider
    {
        $query = Slider::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type' => $this->type,
        ]);


        return $dataProvider;
    }

    public function statusList(): array
    {
        return SliderHelper::statusList();
    }
}
