<?php

namespace shop\forms\manage\Blog\Post;
use Yii;
use shop\entities\Blog\Category;
use shop\entities\Blog\Post\Post;
use shop\entities\Shop\Languages;
use shop\forms\CompositeForm;
use shop\forms\manage\MetaForm;
use shop\validators\SlugValidator;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * @property MetaForm $meta
 * @property TagsForm $tags
 */
class PostForm extends CompositeForm
{
    public $categoryId;
    public $photo;

    public function __construct(Post $post = null, $config = [])
    {
        if ($post) {
            $this->translations = array_map(function (array $language) use ($post) {
                return new PostTranslationsForm($post->getTranslation($language['id']));
            }, Languages::langList(\Yii::$app->params['languages']));
            $this->categoryId = $post->category_id;
            $this->meta = new MetaForm($post->meta);
            $this->tags = new TagsForm($post);
        } else {
            $this->translations = array_map(function () {
                return new PostTranslationsForm();
            }, Languages::find()->all());
            $this->meta = new MetaForm();
            $this->tags = new TagsForm();
        }
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['categoryId'], 'required'],
            [['categoryId'], 'integer'],
            [['photo'], 'image'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'categoryId'=> Yii::t('app','Type News'),
            'photo' => Yii::t('app','Images'),
        ];
    }

    public function categoriesList(): array
    {
        return ArrayHelper::map(Category::find()->select('*')
            ->innerJoin('blog_category_translations', 'blog_categories.id = blog_category_translations.category_id')
            ->orderBy('blog_category_translations.name')
            ->asArray()->all(), 'id', function (array $tag) {
            return $tag['name'];
        });
    }
    protected function internalForms(): array
    {
        return ['meta', 'tags', 'translations'];
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
