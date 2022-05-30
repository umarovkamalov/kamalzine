<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */

?>
<div class="col-md-8 col-sm-7 dual-posts padding-bottom-30">
<?= \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'layout' => "{items}\n{pager}",
    'itemView' => '_post',
]) ?>
</div>
