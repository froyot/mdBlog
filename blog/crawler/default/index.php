<?php
use app\common\widgets\ListView;
use yii\helpers\Url;
$this->registerJsFile('@web/js/blog/ace.js',['depends'=>'yii\web\JqueryAsset']);
$this->registerjsFile('@web/js/blog/markdown.js',['depends'=>'yii\web\JqueryAsset']);
$this->registerJs('
    var markdown = ace.require("ace/handler/Markdown");
    $(".markdown").each(function(index,item){
        $(this).html(markdown.toHTML($(this).html()));
    });
');
?>
<?php foreach($data as $model):?>
<div class="markdown">
<?=$model->content;?>
</div>
<div style="text-align:right;"><a href="<?=Url::to(['default/detail','id'=>$model->id]);?>">Detail&gt;&gt;&gt;</a></div>

<hr>
<br/>
<?php endforeach;?>





