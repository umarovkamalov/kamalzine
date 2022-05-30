<?php

namespace shop\entities\Views;

use yii\db\ActiveRecord;

class ViewPost extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%create_post_logs_table}}';
    }

    public function rules()
    {
        return [
            [['cat_id', 'view', 'post_id', 'count'], 'integer'],
            [['token'], 'string'],
        ];
    }
}
