<?php

namespace shop\forms\manage\Blog\Post;
use shop\entities\Blog\Post\PostTranslations;
use Yii;
use yii\base\Model;

/**
 * @property integer $id
 * @property string $content
 * @property string $title
 * @property string $description
 * @property integer $lang_id
 * @property integer $blog_id
 */
class PostTranslationsForm extends Model
{
    public $content;
    public $title;
    public $description;
    public $lang_id;


    public function __construct(PostTranslations $translations = null, $config = [])
    {
        if ($translations) {
            $this->content = $translations->content;
            $this->title = $translations->title;
            $this->description = $translations->description;
            $this->lang_id = $translations->lang_id;
        }

        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['title', 'lang_id'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['description', 'content'], 'string'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'content' => Yii::t('app', 'Content'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'lang_id' => Yii::t('app', 'Language'),
        ];
    }
}