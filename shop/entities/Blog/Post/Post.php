<?php

namespace shop\entities\Blog\Post;
use yii\helpers\Html;
use shop\entities\Blog\Post\Comment;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use shop\entities\behaviors\MetaBehavior;
use shop\entities\Blog\Post\queries\CommentQuery;
use shop\entities\Blog\Post\queries\PostQuery;
use shop\entities\Meta;
use shop\entities\Blog\Category;
use shop\entities\Blog\Tag;
use shop\entities\Shop\Languages;
use shop\services\WaterMarker;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yiidreamteam\upload\ImageUploadBehavior;

/**
 * @property integer $id
 * @property integer $category_id
 * @property integer $created_at
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $photo
 * @property integer $status
 * @property integer $comments_count
 *
 * @property Meta $meta
 * @property Category $category
 * @property TagAssignment[] $tagAssignments
 * @property Tag[] $tags
 * @property Comment[] $comments
 *
 * @mixin ImageUploadBehavior
 */
class Post extends ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_ACTIVE = 1;

    public $meta;

    public static function create($categoryId, Meta $meta): self
    {
        $post = new static();
        $post->category_id = $categoryId;
        $post->meta = $meta;
        $post->status = self::STATUS_DRAFT;
        $post->created_at = time();
        $post->comments_count = 0;
        return $post;
    }

    public function setPhoto(UploadedFile $photo): void
    {
        $this->photo = $photo;
    }


    public function edit($categoryId, Meta $meta): void
    {
        $this->category_id = $categoryId;
        $this->meta = $meta;
    }

    public function activate(): void
    {
        if ($this->isActive()) {
            throw new \DomainException('Post is already active.');
        }
        $this->status = self::STATUS_ACTIVE;
    }

    public function draft(): void
    {
        if ($this->isDraft()) {
            throw new \DomainException('Post is already draft.');
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

    public function getSeoTitle(): string
    {
        return $this->meta->title ?: $this->title;
    }

    // Tags

    public function assignTag($id): void
    {
        $assignments = $this->tagAssignments;
        foreach ($assignments as $assignment) {
            if ($assignment->isForTag($id)) {
                return;
            }
        }
        $assignments[] = TagAssignment::create($id);
        $this->tagAssignments = $assignments;
    }

    public function revokeTag($id): void
    {
        $assignments = $this->tagAssignments;
        foreach ($assignments as $i => $assignment) {
            if ($assignment->isForTag($id)) {
                unset($assignments[$i]);
                $this->tagAssignments = $assignments;
                return;
            }
        }
        throw new \DomainException('Assignment is not found.');
    }

    public function revokeTags(): void
    {
        $this->tagAssignments = [];
    }

    // Comments

    public function addComment($userId, $parentId, $text): Comment
    {
        $parent = $parentId ? $this->getComment($parentId) : null;
        if ($parent && !$parent->isActive()) {
            throw new \DomainException('Cannot add comment to inactive parent.');
        }
        $comments = $this->comments;
        $comments[] = $comment = Comment::create($userId, $parent ? $parent->id : null, $text);
        $this->updateComments($comments);
        return $comment;
    }

    public function editComment($id, $parentId, $text): void
    {
        $parent = $parentId ? $this->getComment($parentId) : null;
        $comments = $this->comments;
        foreach ($comments as $comment) {
            if ($comment->isIdEqualTo($id)) {
                $comment->edit($parent ? $parent->id : null, $text);
                $this->updateComments($comments);
                return;
            }
        }
        throw new \DomainException('Comment is not found.');
    }

    public function activateComment($id): void
    {
        $comments = $this->comments;
        foreach ($comments as $comment) {
            if ($comment->isIdEqualTo($id)) {
                $comment->activate();
                $this->updateComments($comments);
                return;
            }
        }
        throw new \DomainException('Comment is not found.');
    }

    public function removeComment($id): void
    {
        $comments = $this->comments;
        foreach ($comments as $i => $comment) {
            if ($comment->isIdEqualTo($id)) {
                if ($this->hasChildren($comment->id)) {
                    $comment->draft();
                } else {
                    unset($comments[$i]);
                }
                $this->updateComments($comments);
                return;
            }
        }
        throw new \DomainException('Comment is not found.');
    }

    public function getComment($id): Comment
    {
        foreach ($this->comments as $comment) {
            if ($comment->isIdEqualTo($id)) {
                return $comment;
            }
        }
        throw new \DomainException('Comment is not found.');
    }

    private function hasChildren($id): bool
    {
        foreach ($this->comments as $comment) {
            if ($comment->isChildOf($id)) {
                return true;
            }
        }
        return false;
    }

    private function updateComments(array $comments): void
    {
        $this->comments = $comments;
        $this->comments_count = count(array_filter($comments, function (Comment $comment) {
            return $comment->isActive();
        }));
    }

    //name

    public function getContent()
    {
        if($trans = PostTranslations::find()->where(['post_id' => $this->id, 'lang_id' => Languages::thisLanguage()])->one()){
            return $trans ? $trans->content : '';
        }
        return '';
    }

    public function getDescription()
    {
        if($trans = PostTranslations::find()->where(['post_id' => $this->id, 'lang_id' => Languages::thisLanguage()])->one()){
            return $trans ? $trans->description : '';
        }
        return '';
    }

    public function getTitle()
    {
        if($trans = PostTranslations::find()->where(['post_id' => $this->id, 'lang_id' => Languages::thisLanguage()])->one()){
            return $trans ? $trans->title : '';
        }
        return '';
    }
    public function setTranslation($lang_id, $content, $title, $description): void
    {
        $translations = $this->translations;
        foreach ($translations as $tr) {
            if ($tr->isForLanguage($lang_id)) {
                $tr->edit($content, $title, $description);
                $this->translations = $translations;
                return;
            }
        }
        $translations[] = PostTranslations::create($lang_id, $content, $title, $description);
        $this->translations = $translations;
    }

    // main function for translation columns

    public function getTranslation($id): PostTranslations
    {
        $translations = $this->translations;
        foreach ($translations as $tr) {
            if ($tr->isForLanguage($id)) {
                return $tr;
            }
        }
        return PostTranslations::blank($id);
    }

    public function getTranslations(): ActiveQuery
    {
        return $this->hasMany(PostTranslations::class, ['post_id' => 'id']);
    }
    ##########################

    public function getCategory(): ActiveQuery
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getTagAssignments(): ActiveQuery
    {
        return $this->hasMany(TagAssignment::class, ['post_id' => 'id']);
    }

    public function WherePhoto($id): string
    {
        $post = $this->find()->with('category')->where(['id'=>$id])->one();
         return Html::encode($post->getThumbFileUrl('photo', 'widget_popular_list'));
    }

    public function getTags(): ActiveQuery
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->via('tagAssignments');
    }

    public function getComments(): ActiveQuery
    {
        return $this->hasMany(Comment::class, ['post_id' => 'id']);
    }

    ##########################

    public static function tableName(): string
    {
        return '{{%blog_posts}}';
    }

    /*
     * Photo standards:
        High quality picsel: 2382x1686 px
        Standard site piksel: 1191x843 px
        Catalog list piksel: 236x167 px
        Cart widget list: 57x40 px;
        Cart list: 160x113
        Thumb(mini): 640x453
        Admin: 110x78
     * */

    public function behaviors(): array
    {
        return [
            MetaBehavior::className(),
            [
                'class' => SaveRelationsBehavior::className(),
                'relations' => ['tagAssignments', 'translations', 'comments'],
            ],
            [
                'class' => ImageUploadBehavior::className(),
                'attribute' => 'photo',
                'createThumbsOnRequest' => true,
                'filePath' => '@staticRoot/origin/posts1/[[id]].[[extension]]',
                'fileUrl' => '@static/origin/posts1/[[id]].[[extension]]',
                'thumbPath' => '@staticRoot/cache/posts1/[[profile]]_[[id]].[[extension]]',
                'thumbUrl' => '@static/cache/posts1/[[profile]]_[[id]].[[extension]]',
                'thumbs' => [
                    'admin' => ['width' => 135, 'height' => 85],
                    'thumb' => ['width' => 921, 'height' => 580],
                    'blog_list' => ['width' => 270, 'height' => 170],
                    'widget_top_list' => ['width' => 600, 'height' => 304],
                    'widget_list' => ['width' => 220, 'height' => 143],
                    'widget_popular_list' => ['width' => 180, 'height' => 113],
                    'widget_also_list' => ['width' => 480, 'height' => 301],
                    'widget_video_list' => ['width' => 400, 'height' => 251],
                    'origin' => ['processor' => [new WaterMarker(1000, 648, '@frontend/web/image/logo.png'), 'process']],
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

    public static function find(): PostQuery
    {
        return new PostQuery(static::class);
    }
}