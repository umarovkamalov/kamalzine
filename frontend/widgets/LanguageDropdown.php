<?php

namespace frontend\widgets;

use Yii;
use yii\bootstrap\Dropdown;
use yii\helpers\Html;

class LanguageDropdown extends Dropdown
{
    private static $_labels;

    private $_isError;

    public function init()
    {
        $route = Yii::$app->controller->route;
        $appLanguage = Yii::$app->language;
        $params = $_GET;
        $this->_isError = $route === Yii::$app->errorHandler->errorAction;

        array_unshift($params, '/' . $route);

        foreach (Yii::$app->urlManager->languages as $language) {
            if(isset($params['lang'])){
                $params['lang'] = $language;
            }else{

                $params['language'] = $language;
            }
            $this->items[] = [
                'label' => self::label($language),
                'url' => $params,
                'options' => [
                    'class' => $language === $appLanguage ? 'active' : ''
                ]
            ];
        }
        parent::init();
        Html::removeCssClass($this->options, ['widget' => 'dropdown-menu']);
        Html::addCssClass($this->options, ['widget' => 'lang']);
    }

    public function run()
    {
        // Only show this widget if we're not on the error page
        if ($this->_isError) {
            return '';
        } else {
            return parent::run();
        }
    }


    public static function label($code)
    {
        if (self::$_labels === null) {
            self::$_labels = [
                'ru' => 'РУС',
                'en' => 'ENG',
                'uz' => 'O`ZB',
                'oz' => 'УЗБ',
            ];
        }

        return isset(self::$_labels[$code]) ? self::$_labels[$code] : null;
    }
}