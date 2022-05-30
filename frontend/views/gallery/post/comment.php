<?php

/* @var $this yii\web\View */
/* @var $post shop\entities\Blog\Post\Post */
/* @var $model \shop\forms\Blog\CommentForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('app','Comment');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Blog'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $post->category->name, 'url' => ['category', 'slug' => $post->category->slug]];
$this->params['breadcrumbs'][] = ['label' => $post->title, 'url' => ['post', 'id' => $post->id]];
$this->params['breadcrumbs'][] = $this->title;

$this->params['active_category'] = $post->category;
?>

<h3 class="heading-1"><span><?= Html::encode($post->title) ?></span></h3>

<div class="comments-list margin-bottom-20 wow fadeIn" style="visibility: hidden; animation-name: none;">
    <div class="comment-content first wow fadeIn" style="visibility: hidden; animation-name: none;">
        <img src="images/comments/avatar.png" tppabs="http://ckthemes.com/html/watcher/images/comments/avatar.png" alt="">

        <h5><b>Robert Gourley</b> <span class="pull-right">Sep 27, 2015 at 12:17 pm</span></h5>
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        <a href="#" class="reply">Reply</a>
    </div>

    <div class="comment-content wow fadeIn" style="visibility: hidden; animation-name: none;">
        <img src="images/comments/avatar2.png" tppabs="http://ckthemes.com/html/watcher/images/comments/avatar2.png" alt="">

        <h5><b>Robert Gourley</b> <span class="pull-right">Sep 27, 2015 at 12:17 pm</span></h5>
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        <a href="#" class="reply">Reply</a>

        <div class="sub-comment wow fadeIn" style="visibility: hidden; animation-name: none;">
            <img src="images/comments/avatar.png" tppabs="http://ckthemes.com/html/watcher/images/comments/avatar.png" alt="">
            <h5><b>Robert Gourley</b> <span class="pull-right">Sep 27, 2015 at 12:17 pm</span></h5>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            <a href="#" class="reply">Reply</a>
        </div>

        <div class="sub-comment wow fadeIn" style="visibility: hidden; animation-name: none;">
            <img src="images/comments/avatar2.png" tppabs="http://ckthemes.com/html/watcher/images/comments/avatar2.png" alt="">
            <h5><b>Robert Gourley</b> <span class="pull-right">Sep 27, 2015 at 12:17 pm</span></h5>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            <a href="#" class="reply">Reply</a>
        </div>
    </div>

    <div class="comment-content last wow fadeIn" style="visibility: hidden; animation-name: none;">
        <img src="images/comments/avatar.png" tppabs="http://ckthemes.com/html/watcher/images/comments/avatar.png" alt="">

        <h5><b>Robert Gourley</b> <span class="pull-right">Sep 27, 2015 at 12:17 pm</span></h5>
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        <a href="#" class="reply">Reply</a>
    </div>

</div>

<h3 class="heading-1"><span>Leave a reply</span></h3>

<?php $form = ActiveForm::begin([
    'action' => ['comment', 'id' => $post->id, 'class'=> 'post-comment-form'],
]); ?>
<label>Your message</label>
<?= Html::activeHiddenInput($model, 'parentId') ?>
<?= $form->field($model, 'text')->textarea(['rows' => 5]) ?>
<div class="row wow fadeIn" style="visibility: hidden; animation-name: none;">
    <div class="col-md-6 wow fadeIn" style="visibility: hidden; animation-name: none;">
        <label>Your Name</label>
        <input type="text">
    </div>

    <div class="col-md-6 wow fadeIn" style="visibility: hidden; animation-name: none;">
        <label>Your Email</label>
        <input type="email">
    </div>
</div>

<?= Html::submitButton(Yii::t('app','Send own comment'), ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>

