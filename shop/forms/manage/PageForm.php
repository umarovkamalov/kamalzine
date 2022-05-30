<?php

namespace shop\forms\manage;
use Yii;
use abdualiym\languageClass\Language;
use shop\entities\Page;
use shop\entities\Shop\Languages;
use shop\forms\CompositeForm;
use shop\validators\SlugValidator;
use yii\helpers\ArrayHelper;

/**
 * @property MetaForm $meta;
 */
class PageForm extends CompositeForm
{
    public $slug;
    public $parentId;

    private $_page;

    public function __construct(Page $page = null, $config = [])
    {
        if ($page) {
            $this->translations = array_map(function (array $language) use ($page) {
            return new PageTranslationsForm($page->getTranslation($language['id']));
        }, Language::langList(\Yii::$app->params['languages']));
            $this->slug = $page->slug;
            $this->parentId = $page->parent ? $page->parent->id : null;
            $this->meta = new MetaForm($page->meta);
            $this->_page = $page;
        } else {
            $this->translations = array_map(function () {
                return new PageTranslationsForm();
            }, Languages::find()->all());
            $this->meta = new MetaForm();
        }
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['slug'], 'required'],
            [['parentId'], 'integer'],
            [['slug'], 'string', 'max' => 255],
            ['slug', SlugValidator::class],
            [['slug'], 'unique', 'targetClass' => Page::class, 'filter' => $this->_page ? ['<>', 'id', $this->_page->id] : null]
        ];
    }

    public function parentsList(): array
    {
        return ArrayHelper::map(Page::find()->select('*')
            ->innerJoin('page_translations',
                'pages.id = page_translations.page_id')
            ->orderBy('pages.lft')
            ->asArray()->all(), 'id',
            function (array $page) {
            return ($page['depth'] > 1 ? str_repeat('-- ', $page['depth'] - 1) . ' ' : '') . $page['title'];
        });
    }

    public function attributeLabels(): array
    {
        return [
            'parentId' => Yii::t('app', 'Parent Page'),
            'slug' => Yii::t('app', 'Name Slug'),
        ];
    }

    public function internalForms(): array
    {
        return ['meta','translations'];
    }
}