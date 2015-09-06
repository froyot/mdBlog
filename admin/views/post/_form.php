<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\admin\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\blog\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>
     <?= $form->field($model, 'category_id')->dropDownList(Category::getCategorys(),['prompt' => '选择分类']); ?>
    <?= $form->field($model, 'content')->textArea(['style'=>'display:none;','id'=>'post_content']) ?>
    <?= Html::tag('div',$model->content,['id'=>'md_post_content']);?>

        <iframe src="/web/static/blog/preview.html" id="preview" style="width:100%;height:400px;"></iframe>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
