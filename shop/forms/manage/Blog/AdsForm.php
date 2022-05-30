<?php

namespace shop\forms\manage\Blog;

use shop\entities\Blog\Ads;
use shop\helpers\AdsHelper;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 */
class AdsForm extends Model
{
    public $type;
    public $url;
    public $photo;


    public function __construct(Ads $ads = null, $config = [])
    {
        if ($ads) {
            $this->type = $$ads->type;
            $this->url = $ads->url;
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
        return AdsHelper::typeList();
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