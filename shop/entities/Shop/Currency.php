<?php

namespace shop\entities\Shop;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $name
 * @property string $slug
 */
class Currency extends ActiveRecord
{
    public function CursUSD($to): float
    {
        $rating = Currency::find()->where(['from' => 'USD', 'to' => $to])->one();
        return $rating ? $rating->rating : 0;
    }

    public static function tableName(): string
    {
        return '{{%currency}}';
    }
}