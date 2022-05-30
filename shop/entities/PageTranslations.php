<?php

namespace shop\entities;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;



/**
 * @property integer $lang_id
 * @property string $product_id
 * @property string $content
 * @property string $title
 * @property string $meta
 *
 */
class PageTranslations extends ActiveRecord
{

    // create
    public static function create($lang_id, $content, $title): self
    {
        $translation = new static();
        $translation->lang_id = $lang_id;
        $translation->content = $content;
        $translation->title = $title;
        return $translation;
    }

    public static function blank($lang_id): self
    {
        $translation = new static();
        $translation->lang_id = $lang_id;
        return $translation;
    }

    public function edit($content, $title)
    {
        $this->content = $content;
        $this->title = $title;

    }

    // select language
    public function isForLanguage($id): bool
    {
        return $this->lang_id == $id;
    }

    public function getPage(): ActiveQuery
    {
        return $this->hasOne(Page::class, ['id' => 'page_id']);
    }
    // this table
    public static function tableName(): string
    {
        return '{{%page_translations}}';
    }
}
