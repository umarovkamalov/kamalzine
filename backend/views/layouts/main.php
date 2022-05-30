<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

backend\assets\AppAsset::register($this);

//dmstr\web\AdminLteAsset::register($this);

//$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@web/almasaeed2010/adminlte/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="navbar-primary">
<?php $this->beginBody() ?>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->

    <?= $this->render(
        'header.php'
    //['directoryAsset' => $directoryAsset]
    )
    ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="row row-offcanvas row-offcanvas-right">
            <!-- partial:partials/_sidebar.html -->
    <?= $this->render(
        'left.php'
        //['directoryAsset' => $directoryAsset]
    )
    ?>


            <?= \common\widgets\Alert::widget() ?>
            <?= $content ?>

            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="container-fluid clearfix">
             <span class="float-right">
                 <a href="#">SportGazeta Admin </a> &copy; 2018
             </span>
                </div>
            </footer>

            <!-- partial -->
        </div>
        <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
