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
<div class="title-wrapper">
<h3><?= Html::encode($post->title) ?></h3>
</div>
<?php $form = ActiveForm::begin([
    'action' => ['comment', 'id' => $post->id],
]); ?>

<?= Html::activeHiddenInput($model, 'parentId') ?>
<?= $form->field($model, 'text')->textarea(['rows' => 5]) ?>

<div class="form-group">
    <?= Html::submitButton(Yii::t('app','Send own comment'), ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

