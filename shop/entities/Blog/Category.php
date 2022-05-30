<?php

namespace shop\entities\Blog;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use shop\entities\behaviors\MetaBehavior;
use shop\entities\Meta;
use shop\entities\Shop\Languages;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property int $sort
 * @property Meta $meta
 */
class Category extends ActiveRecord
{
    public $meta;

    public static function create($slug, $sort, Meta $meta): self
    {
        $category = new static();
        $category->slug = $slug;
        $category->sort = $sort;
        $category->meta = $meta;
        return $category;
    }

    public function edit($slug, $sort, Meta $meta): void
    {
        $this->slug = $slug;
        $this->sort = $sort;
        $this->meta = $meta;
    }
    //name

    public function getName()
    {
        if($trans = CategoryTranslations::find()->where(['category_id' => $this->id, 'lang_id' => Languages::thisLanguage()])->one()){
            return $trans ? $trans->name : '';
        }
        return '';
    }

    public function getDescription()
    {
        if($trans = CategoryTranslations::find()->where(['category_id' => $this->id, 'lang_id' => Languages::thisLanguage()])->one()){
            return $trans ? $trans->description : '';
        }
        return '';
    }

    public function getTitle()
    {
        if($trans = CategoryTranslations::find()->where(['category_id' => $this->id, 'lang_id' => Languages::thisLanguage()])->one()){
            return $trans ? $trans->title : '';
        }
        return '';
    }

    public function setTranslation($lang_id, $name, $title, $description): void
    {
        $translations = $this->translations;
        foreach ($translations as $tr) {
            if ($tr->isForLanguage($lang_id)) {
                $tr->edit($name, $title, $description);
                $this->translations = $translations;
                return;
            }
        }
        $translations[] = CategoryTranslations::create($lang_id, $name, $title, $description);
        $this->translations = $translations;
    }

    // main function for translation columns

    public function getTranslation($id): CategoryTranslations
    {
        $translations = $this->translations;
        foreach ($translations as $tr) {
            if ($tr->isForLanguage($id)) {
                return $tr;
            }
        }
        return CategoryTranslations::blank($id);
    }

    public function getTranslations(): ActiveQuery
    {
        return $this->hasMany(CategoryTranslations::class, ['category_id' => 'id']);
    }
    public function getSeoTitle(): string
    {
        return $this->meta->title ?: $this->getHeadingTile();
    }

    public function getHeadingTile(): string
    {
        return $this->title ?: $this->name;
    }

    public static function tableName(): string
    {
        return '{{%blog_categories}}';
    }

    public function behaviors(): array
    {
        return [
            MetaBehavior::className(),
            [
                'class' => SaveRelationsBehavior::className(),
                'relations' => ['translations'],
            ],
        ];
    }
}