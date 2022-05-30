<?php

namespace shop\entities\Blog;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;



/**
 * @property integer $lang_id
 * @property string $tag_id
 * @property string $name
 *
 */
class TagTranslations extends ActiveRecord
{

    // create
    public static function create($lang_id, $name): self
    {
        $translation = new static();
        $translation->lang_id = $lang_id;
        $translation->name = $name;
        return $translation;
    }

    public static function blank($lang_id): self
    {
        $translation = new static();
        $translation->lang_id = $lang_id;
        return $translation;
    }

    public function edit($name)
    {
        $this->name = $name;
    }

    // select language
    public function isForLanguage($id): bool
    {
        return $this->lang_id == $id;
    }

    public function getTag(): ActiveQuery
    {
        return $this->hasOne(Tag::class, ['id' => 'tag_id']);
    }
    // this table
    public static function tableName(): string
    {
        return '{{%blog_tag_translations}}';
    }
}
