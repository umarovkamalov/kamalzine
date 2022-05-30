<?php

namespace shop\forms\manage\Blog;

use shop\entities\Blog\Tag;
use shop\entities\Shop\Languages;
use shop\forms\CompositeForm;
use shop\validators\SlugValidator;

class TagForm extends CompositeForm
{
    public $slug;

    private $_tag;

    public function __construct(Tag $tag = null, $config = [])
    {
        if ($tag) {
            $this->translations = array_map(function (array $language) use ($tag) {
                return new TagTranslationsForm($tag->getTranslation($language['id']));
            }, Languages::langList());
            $this->slug = $tag->slug;
            $this->_tag = $tag;
        }else{
            $this->translations = array_map(function () {
                return new TagTranslationsForm();
            }, Languages::find()->all());
        }

        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['slug'], 'required'],
            [['slug'], 'string', 'max' => 255],
            ['slug', SlugValidator::class],
            [['slug'], 'unique', 'targetClass' => Tag::class, 'filter' => $this->_tag ? ['<>', 'id', $this->_tag->id] : null]
        ];
    }


    public function internalForms(): array
    {
        return ['translations'];
    }
}