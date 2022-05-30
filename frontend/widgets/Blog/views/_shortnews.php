<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

?>

<?php $i = 0; foreach ($posts as $post): $i++; ?>
    <?php $url = Url::to(['/blog/post/post', 'id' =>$post->id]); ?>

<div class="item">
    <a href="<?=$url; ?>"> <?= Html::encode(StringHelper::truncateWords(strip_tags($post->description), 7)) ?>...</a>
</div>

<?php endforeach; ?>