<?php

namespace shop\helpers;

use shop\entities\Blog\Menu;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class MenuHelper
{
    public static function statusList(): array
    {
        return [
            Menu::STATUS_DRAFT => 'Draft',
            Menu::STATUS_ACTIVE => 'Active',
        ];
    }

    public static function statusName($status): string
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status): string
    {
        switch ($status) {
            case Menu::STATUS_DRAFT:
                $class = 'label label-default';
                break;
            case Menu::STATUS_ACTIVE:
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
            Menu::TYPE_SIMPLE => 'Стандарт меню',
            Menu::TYPE_DROP => 'Под меню',
            Menu::TYPE_MEGA => 'Мега Меню',
        ];
    }

    public static function typeName($status): string
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function typeLabel($type): string
    {
        switch ($type) {
            case Menu::TYPE_SIMPLE:
                $class = 'label label-default';
                break;
            case Menu::TYPE_DROP:
                $class = 'label label-success';
                break;
            case Menu::TYPE_MEGA:
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