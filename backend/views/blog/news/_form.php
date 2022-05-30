<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\Blog\Post\PostForm */
/* @var $form yii\widgets\ActiveForm */

$langList = \shop\entities\Shop\Languages::langList(Yii::$app->params['languages'], true);

foreach ($model->translations as $i => $translation) {
    if (!$translation->lang_id) {
        $q = 0;
        foreach ($langList as $k => $l) {
            if ($i == $q) {
                $translation->lang_id = $k;
            }
            $q++;
        }
    }
}
?>

<div class="post-form">
    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <h1 class="box box-default">
                <h1 class="page-title"><?= Yii::t('app', 'Common')?></h1>
                <div class="box-body">
                    <?= $form->field($model, 'categoryId')->dropDownList($model->categoriesList(), ['prompt' => '']) ?>
                </div>
                <div class="box-body">
                    <?= $form->field($model, 'newsId')->dropDownList($model->newsList(), ['prompt' => '']) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border"><?= Yii::t('app','Tags')?></div>
                <div class="box-body">
                    <?= $form->field($model->tags, 'existing')->checkboxList($model->tags->tagsList()) ?>
                    <?= $form->field($model->tags, 'textNew')->textInput() ?>
                </div>
            </div>
        </div>


    <h1 class="page-title"><?= Yii::t('app', 'Photos')?></h1>
    <div class="box box-default card" style="padding: 10px;">
        <p class="alert-info" >
            Standard site piksel: 960x370 px
            Also:
            High quality piksel: 1907x735 px
        </p>
        <div class="box-body">
            <?= $form->field($model, 'photo')->label(false)->widget(FileInput::class, [
                'options' => [
                    'accept' => 'image/*',
                ]
            ]) ?>
        </div>
    </div>

    <div class="box box-default">
        <h1 class="page-title">SEO</h1>
        <div class="box-body">
            <?= $form->field($model->meta, 'title')->textInput() ?>
            <?= $form->field($model->meta, 'description')->textarea(['rows' => 2]) ?>
            <?= $form->field($model->meta, 'keywords')->textInput() ?>
        </div>
    </div>

    <h1 class="page-title"><?= Yii::t('app', 'The form of creating new post')?> </h1>
    <div class="row grid-margin">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title"><?= Yii::t('app', 'Page Information')?></h2>
                    <ul class="nav nav-tabs" id="Demo-tab1" role="tablist">
                        <?php
                        $j = 0;
                        foreach ($model->translations as $translation) {
                            if (isset($langList[$translation->lang_id])) {
                                $j++;
                                ?>
                                <li class="nav-item <?php echo $j === 1 ? 'class="active"' : '' ?>" role="presentation">
                                    <a class="nav-link <?php echo $j === 1 ? 'class="active"' : '' ?>" href="#<?php echo $langList[$translation->lang_id]['prefix'] ?>"
                                       aria-controls="<?php echo $langList[$translation->lang_id]['prefix'] ?>"
                                       role="tab" data-toggle="tab">
                                        <?php echo '(' . $langList[$translation->lang_id]['prefix'] . ') ' . $langList[$translation->lang_id]['title'] ?>
                                    </a>
                                </li>
                            <?php }
                        }
                        ?>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <br>
                        <?php
                        $j = 0;
                        foreach ($model->translations as $i => $translation) {
                            if (isset($langList[$translation->lang_id])) {
                                $j++;
                                ?>
                                <div role="tabpanel" class="tab-pane <?php echo $j == 1 ? 'active' : '' ?>"
                                     id="<?php echo $langList[$translation->lang_id]['prefix'] ?>">

                                    <?php echo $form->field($translation, '[' . $i . ']title')->textInput(['maxlength' => true]); ?>
                                    <?php echo $form->field($translation, '[' . $i . ']description')->textarea(['rows' => 5]); ?>
                                    <?= $form->field($translation, '[' . $i . ']content')->widget(\marqu3s\summernote\Summernote::className(), [
                                        'clientOptions' => []]); ?>

                                    <?php echo $form->field($translation, '[' . $i . ']lang_id')->hiddenInput(['value' => $translation->lang_id])->label(false) ?>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app','Save'), ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
