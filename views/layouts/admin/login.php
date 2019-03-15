<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

\yiister\gentelella\assets\Asset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="fixed-left login-page">

<?php $this->beginBody() ?>
<script>
    var resizefunc = [];
</script>
<div class="container">
    <div class="full-content-center">
        <div class="login-wrap">
            <div class="login-block">
                <?=$content?>
            </div>
        </div>

    </div>
</div>
<!-- the overlay modal element -->
<div class="md-overlay"></div>
<!-- End of eoverlay modal -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
