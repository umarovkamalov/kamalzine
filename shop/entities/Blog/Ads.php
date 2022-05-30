<?php

namespace shop\entities\Blog;

use shop\entities\Blog\queries\AdsQuery;
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
class Ads extends ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_ACTIVE = 1;


    const TYPE_SIMPLE = 0;
    const TYPE_VIDEO = 1;

    public static function create($type, $url): self
    {
        $ads = new static();
        $ads->type = $type;
        $ads->url = $url;
        $ads->status = self::STATUS_DRAFT;
        $ads->created_at = time();
        return $ads;
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
            throw new \DomainException('ads is already active.');
        }
        $this->status = self::STATUS_ACTIVE;
    }

    public function draft(): void
    {
        if ($this->isDraft()) {
            throw new \DomainException('ads is already draft.');
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
        return '{{%blog_ads}}';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => ImageUploadBehavior::className(),
                'attribute' => 'photo',
                'createThumbsOnRequest' => true,
                'filePath' => '@staticRoot/origin/ads/[[id]].[[extension]]',
                'fileUrl' => '@static/origin/ads/[[id]].[[extension]]',
                'thumbPath' => '@staticRoot/cache/ads/[[profile]]_[[id]].[[extension]]',
                'thumbUrl' => '@static/cache/ads/[[profile]]_[[id]].[[extension]]',
                'thumbs' => [
                    'admin' => ['width' => 100, 'height' => 70],
                    'thumb' => ['width' => 300, 'height' => 250],
                    //'widget_list' => ['width' => 228, 'height' => 228],
                    'origin' => ['width' => 300, 'height' => 250],
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

    public static function find(): adsQuery
    {
        return new AdsQuery(static::class);
    }
}