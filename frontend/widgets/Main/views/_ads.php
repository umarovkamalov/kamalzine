<?php
/**
 * Created by davron112.
 * User: User
 * Date: 24.05.2018
 * Time: 9:32
 */

use yii\helpers\Html;
?>

<?php foreach ($ads as $adss):?>
<div class="ad-300 margin-bottom-60 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
    <span><?= Yii::t('app', 'Advertisement')?></span>
    <?php if ($adss->photo): ?>
        <a href="<?= $adss->url; ?>"><img src="<?= Html::encode($adss->getThumbFileUrl('photo', 'origin')) ?>" class="img-responsive" alt="<?= $adss->url; ?>"/></a>
    <?php endif; ?>
</div>
<?php endforeach; ?>

