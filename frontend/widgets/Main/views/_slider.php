<?php
/**
 * Created by davron112.
 * User: User
 * Date: 24.05.2018
 * Time: 9:32
 */

use yii\helpers\Html;
?>

<?php foreach ($slider as $slide):?>
        <div class="ad-banner pull-right hidden-xs">
            <?php if ($slide->photo): ?>
                <a href="<?= $slide->url; ?>"><img src="<?= Html::encode($slide->getThumbFileUrl('photo', 'origin')) ?>" class="img-responsive" alt="<?= $slide->url; ?>"/></a>
            <?php endif; ?>
        </div>
<?php endforeach; ?>

