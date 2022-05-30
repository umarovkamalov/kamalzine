<?php

namespace shop\forms\manage\Blog;
use shop\helpers\MenuHelper;
use Yii;
use shop\entities\Blog\Menu;
use shop\entities\Shop\Languages;
use shop\forms\CompositeForm;
use yii\helpers\ArrayHelper;

/**
 * @property MenuForm $type;
 * @property MenuForm $icon;
 * @property MenuForm $url;
 * @property MenuForm $sort;
 * @property MenuForm $_category;
 */
class MenuForm extends CompositeForm
{


    public $type;
    public $url;
    public $icon;
    public $sort;
    public $parent_id;
    public $_menu;

    public function __construct(Menu $menu = null, $config = [])
    {
        if ($menu) {
            $this->translations = array_map(function (array $language) use ($menu) {
                return new MenuTranslationsForm($menu->getTranslation($language['id']));
            }, Languages::langList(\Yii::$app->params['languages']));
            $this->type = $menu->type;
            $this->icon = $menu->icon;
            $this->url = $menu->url;
            $this->_menu = $menu;
        } else {
            $this->translations = array_map(function () {
                return new MenuTranslationsForm();
            }, Languages::find()->all());
            $this->sort = Menu::find()->max('sort') + 1;
        }
        parent::__construct($config);
    }


    public function parentMenuList(): array
    {
        return ArrayHelper::map(Menu::find()->select('*')->innerJoin('blog_menu_translations', 'blog_menu.id = blog_menu_translations.menu_id')->orderBy('sort')->asArray()->all(), 'id', function (array $category) {
            return ($category['sort'] > 1 ? str_repeat('-- ', $category['sort'] - 1) . ' ' : '') . $category['name'];
        });
    }


    public function rules(): array
    {
        return [
            [['type'], 'integer'],
            [['icon', 'url'], 'string', 'max' => 255],
        ];
    }


    public function typesList(): array
    {
        return MenuHelper::typeList();
    }

    public function attributeLabels()
    {
        return [
            "type" => Yii::t('app', 'Type'),
            "status" => Yii::t('app', 'Status'),
            "icon" => Yii::t('app', 'Icon'),
            "url" => Yii::t('app', 'Url address'),
            "parent_id" => Yii::t('app', 'Parent Menu'),
        ];
    }

    public function internalForms(): array
    {
        return ['translations'];
    }
}