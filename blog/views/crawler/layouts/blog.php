<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\BlogAsset;

/* @var $this \yii\web\View */
/* @var $content string */

BlogAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<h1><?=Yii::$app->params['blog']['blogName'];?></h1>
<p>
<a href="<?=Url::to(['default/index']);?>">Home</a> |
<a href="<?=Url::to(['default/category']);?>">Categorys</a> |
<a href="<?=Url::to(['default/timeline']);?>">TimeLine</a> |
<a href="<?=Url::to(['default/about']);?>">About</a> |
</p>

<hr />
<br/>
<?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
