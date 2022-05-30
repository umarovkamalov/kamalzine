<?php

namespace shop\forms\manage\Blog;
use shop\entities\Blog\CategoryTranslations;
use Yii;
use yii\base\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property integer $lang_id
 * @property integer $blog_id
 */
class CategoryTranslationsForm extends Model
{
    public $name;
    public $title;
    public $description;
    public $lang_id;


    public function __construct(CategoryTranslations $translations = null, $config = [])
    {
        if ($translations) {
            $this->name = $translations->name;
            $this->title = $translations->title;
            $this->description = $translations->description;
            $this->lang_id = $translations->lang_id;
        }

        parent::__construct($config);
    }

    public function rules(): array
    {
        return [

            [['name', 'lang_id'], 'required'],
            [['title', 'name'], 'string', 'max' => 255],
            [['description'], 'string'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'lang_id' => Yii::t('app', 'Language'),
        ];
    }
}