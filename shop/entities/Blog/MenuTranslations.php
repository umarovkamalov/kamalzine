<?php

namespace shop\entities\Blog;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;



/**
 * @property integer $lang_id
 * @property string $category_id
 * @property string $name
 * @property string $title
 *
 */

class MenuTranslations extends ActiveRecord
{

    // create
    public static function create($lang_id, $name, $title): self
    {
        $translation = new static();
        $translation->lang_id = $lang_id;
        $translation->name = $name;
        $translation->title = $title;
        return $translation;
    }

    public static function blank($lang_id): self
    {
        $translation = new static();
        $translation->lang_id = $lang_id;
        return $translation;
    }

    public function edit($name, $title)
    {
        $this->name = $name;
        $this->title = $title;
    }

    // select language
    public function isForLanguage($id): bool
    {
        return $this->lang_id == $id;
    }

    public function getCategory(): ActiveQuery
    {
        return $this->hasOne(Category::class, ['id' => 'menu_id']);
    }
    // this table
    public static function tableName(): string
    {
        return '{{%blog_menu_translations}}';
    }
}

