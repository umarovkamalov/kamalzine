<?php

namespace shop\entities;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use paulzi\nestedsets\NestedSetsBehavior;
use shop\entities\behaviors\MetaBehavior;
use shop\entities\Shop\Languages;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $slug
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 * @property Meta $meta
 *
 * @property Page $parent
 * @property Page[] $parents
 * @property Page[] $children
 * @property Page $prev
 * @property Page $next
 * @mixin NestedSetsBehavior
 */
class Page extends ActiveRecord
{
    public $meta;

    public static function create($slug, Meta $meta): self
    {
        $category = new static();
        $category->slug = $slug;
        $category->meta = $meta;
        return $category;
    }

    public function edit($slug, Meta $meta): void
    {
        $this->slug = $slug;
        $this->meta = $meta;
    }

    public function getSeoTitle(): string
    {
        return $this->meta->title ?: $this->title;
    }

    public function getContent()
    {
        if($trans = PageTranslations::find()->where(['page_id' => $this->id, 'lang_id' => Languages::thisLanguage()])->one()){
            return $trans ? $trans->content : '';
        }
        return '';
    }


    public function getTitle()
    {
        if($trans = PageTranslations::find()->where(['page_id' => $this->id, 'lang_id' => Languages::thisLanguage()])->one()){
            return $trans ? $trans->title : '';
        }
        return '';
    }
    public function setTranslation($lang_id, $content, $title): void
    {
        $translations = $this->translations;
        foreach ($translations as $tr) {
            if ($tr->isForLanguage($lang_id)) {
                $tr->edit($content, $title);
                $this->translations = $translations;
                return;
            }
        }
        $translations[] = PageTranslations::create($lang_id, $content, $title);
        $this->translations = $translations;
    }

    public function getTranslation($id): PageTranslations
    {
        $translations = $this->translations;
        foreach ($translations as $tr) {
            if ($tr->isForLanguage($id)) {
                return $tr;
            }
        }
        return PageTranslations::blank($id);
    }

    public function getTranslations(): ActiveQuery
    {
        return $this->hasMany(PageTranslations::class, ['page_id' => 'id']);
    }
    public static function tableName(): string
    {
        return '{{%pages}}';
    }

    public function behaviors(): array
    {
        return [
            MetaBehavior::className(),
            NestedSetsBehavior::className(),
            [
                'class' => SaveRelationsBehavior::className(),
                'relations' => ['translations'],
            ],
        ];
    }

    public function transactions(): array
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }
}