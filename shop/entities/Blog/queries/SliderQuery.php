<?php

namespace shop\entities\Blog\queries;

use shop\entities\Blog\Slider;
use yii\db\ActiveQuery;

class SliderQuery extends ActiveQuery
{
    /**
     * @param null $alias
     * @return $this
     */
    public function active($alias = null)
    {
        return $this->andWhere([
            ($alias ? $alias . '.' : '') . 'status' => Slider::STATUS_ACTIVE,
        ]);
    }
}