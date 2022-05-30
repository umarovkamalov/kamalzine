<?php

namespace shop\entities\Blog;

use shop\entities\Blog\queries\SliderQuery;
use shop\services\WaterMarker;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yiidreamteam\upload\ImageUploadBehavior;

/**
 * @property integer $id
 * @property integer $type
 * @property integer $created_at
 * @property string $url
 * @property string $photo
 * @property integer $status
 *
 *
 * @mixin ImageUploadBehavior
 */
class Slider extends ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_ACTIVE = 1;


    const TYPE_SIMPLE = 0;
    const TYPE_VIDEO = 1;

    public static function create($type, $url): self
    {
        $slider = new static();
        $slider->type = $type;
        $slider->url = $url;
        $slider->status = self::STATUS_DRAFT;
        $slider->created_at = time();
        return $slider;
    }

    public function setPhoto(UploadedFile $photo): void
    {
        $this->photo = $photo;
    }

    public function edit($type, $url): void
    {
        $this->type = $type;
        $this->url = $url;
    }

    public function activate(): void
    {
        if ($this->isActive()) {
            throw new \DomainException('Slider is already active.');
        }
        $this->status = self::STATUS_ACTIVE;
    }

    public function draft(): void
    {
        if ($this->isDraft()) {
            throw new \DomainException('Slider is already draft.');
        }
        $this->status = self::STATUS_DRAFT;
    }

    public function isActive(): bool
    {
        return $this->status == self::STATUS_ACTIVE;
    }


    public function isDraft(): bool
    {
        return $this->status == self::STATUS_DRAFT;
    }

    public static function tableName(): string
    {
        return '{{%blog_sliders}}';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => ImageUploadBehavior::className(),
                'attribute' => 'photo',
                'createThumbsOnRequest' => true,
                'filePath' => '@staticRoot/origin/sliders/[[id]].[[extension]]',
                'fileUrl' => '@static/origin/sliders/[[id]].[[extension]]',
                'thumbPath' => '@staticRoot/cache/sliders/[[profile]]_[[id]].[[extension]]',
                'thumbUrl' => '@static/cache/sliders/[[profile]]_[[id]].[[extension]]',
                'thumbs' => [
                    'admin' => ['width' => 100, 'height' => 70],
                    'thumb' => ['width' => 640, 'height' => 480],
                    //'widget_list' => ['width' => 228, 'height' => 228],
                    'origin' => ['width' => 728, 'height' => 90],
                ],
            ],
        ];
    }

    public function transactions(): array
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public static function find(): SliderQuery
    {
        return new SliderQuery(static::class);
    }
}