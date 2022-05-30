<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 06.05.2018
 * Time: 1:31
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>


<?php foreach($menu as $items):
    ?>

    <?php if ($items->parent_id == 0){?>

<?php }else {
    ?>

    <li><a href="<?= $items->url; ?>" alt="<?= $items->name; ?>"><?= $items->name; ?></a></li>

<?php } ?>
<?php endforeach; ?>