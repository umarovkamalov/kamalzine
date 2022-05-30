<?php

namespace shop\forms\manage\Blog\Post;

use shop\entities\Blog\Post\Post;
use shop\entities\Blog\Tag;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * @property array $newNames
 */
class TagsForm extends Model
{
    public $existing = [];
    public $textNew;

    public function __construct(Post $post = null, $config = [])
    {
        if ($post) {
            $this->existing = ArrayHelper::getColumn($post->tagAssignments, 'tag_id');
        }
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            ['existing', 'each', 'rule' => ['integer']],
            ['textNew', 'string'],
            ['existing', 'default', 'value' => []],
        ];
    }


    public function tagsList(): array
    {
        return ArrayHelper::map(Tag::find()->select('*')
            ->innerJoin('blog_tag_translations', 'blog_tags.id = blog_tag_translations.tag_id')
            ->orderBy('blog_tag_translations.name')
            ->asArray()->all(), 'id', function (array $tag) {
            return $tag['name'];
        });
    }

    public function getNewNames(): array
    {
        return array_filter(array_map('trim', preg_split('#\s*,\s*#i', $this->textNew)));
    }
}