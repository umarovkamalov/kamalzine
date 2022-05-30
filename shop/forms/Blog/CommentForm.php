<?php

namespace shop\forms\Blog;
use Yii;
use yii\base\Model;

class CommentForm extends Model
{
    public $parentId;
    public $text;

    public function rules(): array
    {
        return [
            [['text'], 'required'],
            ['text', 'string'],
            ['parentId', 'integer'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'text' => Yii::t('app','Text'),
            'parentId' => Yii::t('app','Parent')
        ];
    }
}