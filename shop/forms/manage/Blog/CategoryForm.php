<?php

namespace shop\forms\manage\Blog;

use shop\entities\Blog\Category;
use shop\entities\Shop\Languages;
use shop\forms\CompositeForm;
use shop\forms\manage\MetaForm;
use shop\validators\SlugValidator;

/**
 * @property MetaForm $meta;
 */
class CategoryForm extends CompositeForm
{

    public $slug;
    public $sort;

    private $_category;

    public function __construct(Category $category = null, $config = [])
    {
        if ($category) {
            $this->translations = array_map(function (array $language) use ($category) {
                return new CategoryTranslationsForm($category->getTranslation($language['id']));
            }, Languages::langList(\Yii::$app->params['languages']));
            $this->slug = $category->slug;
            $this->sort = $category->sort;
            $this->meta = new MetaForm($category->meta);
            $this->_category = $category;
        } else {
            $this->translations = array_map(function () {
                return new CategoryTranslationsForm();
            }, Languages::find()->all());
            $this->meta = new MetaForm();
            $this->sort = Category::find()->max('sort') + 1;
        }
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['slug'], 'required'],
            [['slug'], 'string', 'max' => 255],
            ['slug', SlugValidator::class],
            [['slug'], 'unique', 'targetClass' => Category::class, 'filter' => $this->_category ? ['<>', 'id', $this->_category->id] : null]
        ];
    }

    public function internalForms(): array
    {
        return ['meta', 'translations'];
    }
}