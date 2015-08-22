<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;
use app\common\widgets\SideNavWidget;

/* @var $this \yii\web\View */
/* @var $content string */

AdminAsset::register($this);
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
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Admin',
                'brandUrl' => ['default/index'],
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['detault/index']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'homeLink'=>['label'=>'Admin','url'=>['default/index']],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <div class="row">
               <div class="col-md-2">
            <?php
            echo SideNavWidget::widget([
                'items' => [
                 [
                     'label' => 'Admin',
                     'url' => ['default/index'],

                 ],
                 [
                     'label' => 'Blog',
                     'items' => [
                          ['label' => 'posts', 'url' => ['post/index']],
                          ['label' => 'Add Post', 'url' => ['post/create']],
                          ['label' => 'Categorys', 'url' => ['category/index']],
                          ['label' => 'Add Category', 'url' => ['category/create']],
                     ],
                 ],
             ],
             'activeUrl'=>Url::to([str_replace('admin/', '', Yii::$app->requestedRoute)]),
            ]);

?>
</div>
<div class="col-md-8">
            <?= $content ?>
</div>
</div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
