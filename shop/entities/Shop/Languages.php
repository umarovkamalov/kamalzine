<?php

namespace shop\entities\Shop;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property string $required
 * @property string $default
 * @property array $variants
 * @property integer $sort
 */
class Languages extends ActiveRecord
{

    public $name;

    public static function create($name): self
    {
        $object = new static();
        $object->name = $name;
        return $object;
    }

    public function edit($name): void
    {
        $this->name = $name;
    }

    public function isLanguage(): bool
    {
        return true;
    }

    public function thisLanguage()
    {

        $langList = Languages::find()->asArray()->all();
        $mas = [];
        foreach ($langList as $value){
          if(Yii::$app->language == $value['name']){
               $mas[] = $value['id'];
          }
        }
        if($mas == null){
            return 1;
        }else{
            return $mas;
        }

    }

    public static function getLangByPrefix($prefix)
    {
        $langList = self::langList();
        for ($i = 0; $i < count($langList); $i++) {
            if ($langList[$i]['prefix'] === $prefix) {
                return $langList[$i];
            }
        }
    }

    public static function getPrefixesLangForCodemix()
    {
        $langList = self::langList();
        $langPrefixes = array();
        for ($i = 0; $i < count($langList); $i++) {
            $langPrefixes[] = $langList[$i]['prefix'];
        }
        return $langPrefixes;
    }


    public static function langList($languages = null, $indexById = false)
    {
        $list = self::getLanguagesArray();

        if (!$languages) {
            return $list;
        }

        $lang = array();
        for ($i = 0; $i < count($list); $i++) {
            for ($j = 0; $j < count($languages); $j++) {
                if ($list[$i]['prefix'] == $languages[$j]) {
                    $lang[] = $list[$i];
                }
            }
        }

        return $indexById ? ArrayHelper::index($lang, 'id') : $lang;
    }

    public static function langIds()
    {
        $langList = self::langList();
        foreach ($langList as $lang) {
            $ids[] = $lang['id'];
        }
        return $ids;
    }

    public static function contentExist($id){
        $list = self::langList(self::getPrefixesLangForCodemix(),true);

        foreach ($list as $key => $l){
            if(\Yii::$app->language == $l['prefix']){
                return (self::getTranslateArray())[$l['id']][$id];
            }
        }


    }
    private function getTranslateArray(){
        return [
            2 => [
                1 => ' английский',
                3 => ' узбекский латиница',
                4 => ' узбекский кирилица',

            ],
            3 => [
                1 => ' ingliz tilida',
                2 => ' rus tilida',
                4 => ' kiril o`zbekchada',

            ],

            4 => [
                1 => ' инглиз тилида',
                2 => ' рус тилида',
                3 => ' лотин ўзбекчада',

            ]

        ];
    }

    private function getLanguagesArray()
    {
        return [
            [
                'id' => '1',
                'prefix' => 'en',
                'title' => 'English'
            ],
            [
                'id' => '2',
                'prefix' => 'ru',
                'title' => 'Русский'
            ],
            [
                'id' => '3',
                'prefix' => 'uz',
                'title' => 'O`zbekcha'
            ],
            [
                'id' => '4',
                'prefix' => 'oz',
                'title' => 'Ўзбекча'
            ],
        ];
    }


    public static function tableName(): string
    {
        return '{{%languages}}';
    }
}