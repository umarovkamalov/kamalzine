<?php

namespace shop\forms\manage\Blog;
use shop\entities\Blog\MenuTranslations;
use Yii;
use yii\base\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property integer $lang_id
 * @property integer $blog_id
 */
class MenuTranslationsForm extends Model
{
    public $name;
    public $title;
    public $lang_id;


    public function __construct(MenuTranslations $translations = null, $config = [])
    {
        if ($translations) {
            $this->name = $translations->name;
            $this->title = $translations->title;
            $this->lang_id = $translations->lang_id;
        }

        parent::__construct($config);
    }

    public function rules(): array
    {
        return [

            [['name', 'lang_id'], 'required'],
            [['title', 'name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'title' => Yii::t('app', 'Title'),
            'lang_id' => Yii::t('app', 'Language'),
        ];
    }
}