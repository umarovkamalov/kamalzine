<?php

namespace shop\entities\Blog\queries;

use shop\entities\Blog\Ads;
use yii\db\ActiveQuery;

class AdsQuery extends ActiveQuery
{
    /**
     * @param null $alias
     * @return $this
     */
    public function active($alias = null)
    {
        return $this->andWhere([
            ($alias ? $alias . '.' : '') . 'status' => Ads::STATUS_ACTIVE,
        ]);
    }
}