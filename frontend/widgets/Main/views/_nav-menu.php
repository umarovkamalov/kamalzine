<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 06.05.2018
 * Time: 1:19
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<?php foreach($menu as $items):
    ?>

    <?php if ($items->parent_id == 0){?>

<?php }else {
    ?>

    <li class="dropdown dropdown-v2">
        <a href="<?= $items->url; ?>" role="button">
            <?= $items->name; ?>
        </a>
    </li>
<?php } ?>
<?php endforeach; ?>
