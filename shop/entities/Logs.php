<?php

namespace shop\entities;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * @property integer  $cat_id;
 *  @property integer  $post_id;
 *  @property integer  $token;
 *   @property integer  $count;
 */
class Logs extends ActiveRecord
{

    const CAT_POST = 0;
    const CAT_PAGE = 1;
    const CAT_ADS = 2;

    public static function create($post_id, $cat_id, $token)
    {
        $item = new static();
        $item->cat_id = $cat_id;
        $item->post_id = $post_id;
        $item->token = $token;
        $item->count = 1;
        return $item;
    }

    public function edit($count)
    {
        $this->count = $count + 1;
    }

    public function CountPost($post, $cat): string
    {
        return Logs::find()->where(['post_id' => $post, 'cat_id'=> $cat])->count();
    }

    public static function tableName(): string
    {
        return '{{%post_logs}}';
    }

    public function behaviors(): array
    {
        return [
            TimestampBehavior::className(),
            [
                'class' => SaveRelationsBehavior::className(),
            ],
        ];
    }

}