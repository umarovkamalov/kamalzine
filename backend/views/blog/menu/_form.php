<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\blog\MenuForm */
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

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="box box-default">
        <div class="box-header with-border"><?= Yii::t('app', 'Common')?></div>
        <div class="box-body">
            <?= $form->field($model, 'parent_id')->dropDownList($model->parentMenuList()) ?>
            <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'type')->dropDownList($model->typesList()) ?>

        </div>
    </div>
    <h1 class="page-title"><?= Yii::t('app', 'The form of creating category')?> </h1>
    <div class="row grid-margin">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title"><?= Yii::t('app', 'Menu Information')?></h2>
                    <ul class="nav nav-tabs" id="Demo-tab1" role="tablist">
                        <?php
                        $j = 0;
                        foreach ($model->translations as $translation) {
                            if (isset($langList[$translation->lang_id])) {
                                $j++;
                                ?>
                                <li class="nav-item" role="presentation">
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

                                    <?php echo $form->field($translation, '[' . $i . ']name')->textInput(['maxlength' => true]); ?>
                                    <?php echo $form->field($translation, '[' . $i . ']title')->textInput(['maxlength' => true]); ?>
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
