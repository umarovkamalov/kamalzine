<?php

namespace shop\entities\Blog;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use shop\entities\Shop\Languages;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $name
 * @property string $slug
 */
class Tag extends ActiveRecord
{
    public static function create($slug): self
    {
        $tag = new static();
        $tag->slug = $slug;
        return $tag;
    }

    public function edit($slug): void
    {
        $this->slug = $slug;
    }

    public function setTranslation($lang_id, $name): void
    {
        $translations = $this->translations;
        foreach ($translations as $tr) {
            if ($tr->isForLanguage($lang_id)) {
                $tr->edit($name);
                $this->translations = $translations;
                return;
            }
        }
        $translations[] = TagTranslations::create($lang_id, $name);
        $this->translations = $translations;
    }

    // main function for translation columns

    public function getTranslation($id): TagTranslations
    {
        $translations = $this->translations;
        foreach ($translations as $tr) {
            if ($tr->isForLanguage($id)) {
                return $tr;
            }
        }
        return TagTranslations::blank($id);
    }

    public function getTranslations(): ActiveQuery
    {
        return $this->hasMany(TagTranslations::class, ['tag_id' => 'id']);
    }

    public function getName()
    {
        if($trans = TagTranslations::find()->where(['tag_id' => $this->id, 'lang_id' => Languages::thisLanguage()])->one()){
            return $trans ? $trans->name : '';
        }
        return '';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => SaveRelationsBehavior::className(),
                'relations' => ['translations'],
            ],
        ];
    }

    public static function tableName(): string
    {
        return '{{%blog_tags}}';
    }
}