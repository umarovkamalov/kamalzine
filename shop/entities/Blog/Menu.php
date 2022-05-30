<?php

namespace shop\entities\Blog;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use shop\entities\Shop\Languages;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * @property integer $id
 * @property integer $type
 * @property string $icon
 * @property integer $status
 * @property string $url
 * @property integer $sort
 */
class Menu extends ActiveRecord
{


    const STATUS_DRAFT = 0;
    const STATUS_ACTIVE = 1;


    const TYPE_SIMPLE = 0;
    const TYPE_DROP = 1;
    const TYPE_MEGA = 2;

    public static function create($type, $icon, $url): self
    {
        $menu = new static();
        $menu->type = $type;
        $menu->icon = $icon;
        $menu->url = $url;
        $menu->status = self::STATUS_DRAFT;
        return $menu;
    }

    public function edit($type, $icon, $url): void
    {
        $this->type = $type;
        $this->icon = $icon;
        $this->url = $url;
    }

    public function getName()
    {
        if($trans = MenuTranslations::find()->where(['menu_id' => $this->id, 'lang_id' => Languages::thisLanguage()])->one()){
            return $trans ? $trans->name : '';
        }
        return '';
    }

    public function getTitle()
    {
        if($trans = MenuTranslations::find()->where(['menu_id' => $this->id, 'lang_id' => Languages::thisLanguage()])->one()){
            return $trans ? $trans->title : '';
        }
        return '';
    }

    public function setTranslation($lang_id, $name, $title): void
    {
        $translations = $this->translations;
        foreach ($translations as $tr) {
            if ($tr->isForLanguage($lang_id)) {
                $tr->edit($name, $title);
                $this->translations = $translations;
                return;
            }
        }
        $translations[] = MenuTranslations::create($lang_id, $name, $title);
        $this->translations = $translations;
    }

    public function getTranslation($id): MenuTranslations
    {
        $translations = $this->translations;
        foreach ($translations as $tr) {
            if ($tr->isForLanguage($id)) {
                return $tr;
            }
        }
        return MenuTranslations::blank($id);
    }

    public function getTranslations(): ActiveQuery
    {
        return $this->hasMany(MenuTranslations::class, ['menu_id' => 'id']);
    }

    public function activate(): void
    {
        if ($this->isActive()) {
            throw new \DomainException('Menu is already active.');
        }
        $this->status = self::STATUS_ACTIVE;
    }

    public function draft(): void
    {
        if ($this->isDraft()) {
            throw new \DomainException('Menu is already draft.');
        }
        $this->status = self::STATUS_DRAFT;
    }

    public function isActive(): bool
    {
        return $this->status == self::STATUS_ACTIVE;
    }


    public function isDraft(): bool
    {
        return $this->status == self::STATUS_DRAFT;
    }


    public function navMenuList($id): array
    {
        return ArrayHelper::map(Menu::find()->select('*')
            ->innerJoin('blog_menu_translations', 'blog_menu.id = blog_menu_translations.menu_id')
            ->andWhere(['in', 'blog_menu.parent_id', $id])
            ->andWhere(['in', 'blog_menu.status',self::STATUS_ACTIVE])
            ->orderBy('sort')
            ->asArray()
            ->all(), 'id', function (array $menu) {
            return ($menu['sort'] > 1 ? str_repeat('-- ', $menu['sort'] - 1) . ' ' : '') . $menu['name'];
        });
    }

    public static function tableName(): string
    {
        return '{{%blog_menu}}';
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
}