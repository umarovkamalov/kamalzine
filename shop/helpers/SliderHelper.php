<?php

namespace shop\helpers;

use shop\entities\Blog\Slider;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class SliderHelper
{
    public static function statusList(): array
    {
        return [
            Slider::STATUS_DRAFT => 'Draft',
            Slider::STATUS_ACTIVE => 'Active',
        ];
    }

    public static function statusName($status): string
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status): string
    {
        switch ($status) {
            case Slider::STATUS_DRAFT:
                $class = 'label label-default';
                break;
            case Slider::STATUS_ACTIVE:
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
            Slider::TYPE_SIMPLE => 'Standart slider',
            Slider::TYPE_VIDEO => 'Slider video',
        ];
    }

    public static function typeName($status): string
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function typeLabel($type): string
    {
        switch ($type) {
            case Slider::TYPE_SIMPLE:
                $class = 'label label-default';
                break;
            case Slider::TYPE_VIDEO:
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