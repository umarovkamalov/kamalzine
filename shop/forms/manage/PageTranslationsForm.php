<?php

namespace shop\forms\manage;
use shop\entities\PageTranslations;
use Yii;
use yii\base\Model;

/**
 * @property integer $id
 * @property string $content
 * @property string $title
 * @property integer $lang_id
 */
class PageTranslationsForm extends Model
{
    public $content;
    public $title;
    public $lang_id;


    public function __construct(PageTranslations $translations = null, $config = [])
    {
        if ($translations) {
            $this->content = $translations->content;
            $this->title = $translations->title;
            $this->lang_id = $translations->lang_id;
        }

        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['title', 'lang_id'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['content'], 'string'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'content' => Yii::t('app', 'Content'),
            'title' => Yii::t('app', 'Title'),
            'lang_id' => Yii::t('app', 'Language'),
        ];
    }
}