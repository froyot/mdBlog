<?php
use yii\helpers\Url;
use yii\helpers\Html;

?>
<div class="post-preview">
    <a href="<?php echo Url::to(['posts/detail','id'=>$model['id']]);?>">
        <div class="markdown">
             <?=$model->content;?>
        </div>
    </a>
    <p class="post-meta"><?=$model->date;?></p>
</div>
<hr>
