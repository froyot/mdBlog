<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\blog\Post */

$this->title = 'Create Post';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('@web/web/js/blog/ace.js',['depends'=>'yii\web\YiiAsset']);
$this->registerJsFile('@web/web/js/blog/theme-twilight.js',['depends'=>'yii\web\YiiAsset']);
$this->registerJsFile('@web/web/js/blog/mode-markdown.js',['depends'=>'yii\web\YiiAsset']);
$this->registerJsFile('@web/web/js/blog/markdown.js',['depends'=>'yii\web\YiiAsset']);
$this->registerJsFile('@web/web/js/blog/editPost.js',['depends'=>'yii\web\YiiAsset']);
$this->registerCss('
#md_post_content {
        position: relative;
        width: 100%;
        height: 400px;
    }
');
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<div id="log">
    </div>

