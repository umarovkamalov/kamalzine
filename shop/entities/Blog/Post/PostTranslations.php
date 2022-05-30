<?php

namespace shop\entities\Blog\Post;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;



/**
 * @property integer $lang_id
 * @property string $product_id
 * @property string $content
 * @property string $title
 * @property string $meta
 * @property string $description
 *
 */
class PostTranslations extends ActiveRecord
{

    // create
    public static function create($lang_id, $content, $title, $description): self
    {
        $translation = new static();
        $translation->lang_id = $lang_id;
        $translation->content = $content;
        $translation->title = $title;
        $translation->description = $description;
        return $translation;
    }

    public static function blank($lang_id): self
    {
        $translation = new static();
        $translation->lang_id = $lang_id;
        return $translation;
    }

    public function edit($content, $title, $description)
    {
        $this->content = $content;
        $this->title = $title;
        $this->description = $description;

    }

    // select language
    public function isForLanguage($id): bool
    {
        return $this->lang_id == $id;
    }

    public function getPost(): ActiveQuery
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }
    // this table
    public static function tableName(): string
    {
        return '{{%blog_post_translations}}';
    }
}
