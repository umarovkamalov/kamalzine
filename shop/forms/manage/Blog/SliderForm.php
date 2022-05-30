<?php

namespace shop\forms\manage\Blog;

use shop\entities\Blog\Slider;
use shop\helpers\SliderHelper;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 */
class SliderForm extends Model
{
    public $type;
    public $url;
    public $photo;


    public function __construct(Slider $slider = null, $config = [])
    {
        if ($slider) {
            $this->type = $slider->type;
            $this->url = $slider->url;
        }
        parent::__construct($config);
    }


        public function rules(): array
    {
        return [
            [['type'], 'integer'],
            [['url'], 'string'],
            [['photo'], 'image'],
        ];
    }

    public function typesList(): array
    {
        return SliderHelper::typeList();
    }

    public function beforeValidate(): bool
    {
        if (parent::beforeValidate()) {
            $this->photo = UploadedFile::getInstance($this, 'photo');
            return true;
        }
        return false;
    }
}