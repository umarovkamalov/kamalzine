<?php

namespace shop\forms\manage\Blog;
use shop\entities\Blog\TagTranslations;
use Yii;
use yii\base\Model;

/**
 * @property integer $id
 * @property string $name
 * @property integer $lang_id
 * @property integer $tag_id
 */
class TagTranslationsForm extends Model
{
    public $name;
    public $lang_id;


    public function __construct(TagTranslations $translations = null, $config = [])
    {
        if ($translations) {
            $this->name = $translations->name;
            $this->lang_id = $translations->lang_id;
        }

        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['name', 'lang_id'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'lang_id' => Yii::t('app', 'Language'),
        ];
    }
}