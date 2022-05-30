<?php

namespace shop\helpers;

use shop\entities\Blog\Ads;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class AdsHelper
{
    public static function statusList(): array
    {
        return [
            Ads::STATUS_DRAFT => 'Draft',
            Ads::STATUS_ACTIVE => 'Active',
        ];
    }

    public static function statusName($status): string
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status): string
    {
        switch ($status) {
            case Ads::STATUS_DRAFT:
                $class = 'label label-default';
                break;
            case Ads::STATUS_ACTIVE:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }

    // type helpers
    public static function typeList(): array
    {
        return [
            Ads::TYPE_SIMPLE => 'Standart ads',
            Ads::TYPE_VIDEO => 'Ads video',
        ];
    }

    public static function typeName($status): string
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function typeLabel($type): string
    {
        switch ($type) {
            case Ads::TYPE_SIMPLE:
                $class = 'label label-default';
                break;
            case Ads::TYPE_VIDEO:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $type), [
            'class' => $class,
        ]);
    }
}