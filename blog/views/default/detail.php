<?php
use yii\helpers\Html;

$this->registerJsFile('@web/js/blog/ace.js',['depends'=>'yii\web\JqueryAsset']);
$this->registerjsFile('@web/js/blog/markdown.js',['depends'=>'yii\web\JqueryAsset']);
$this->registerJs('
    var markdown = ace.require("ace/handler/Markdown");
    $.each(".markdown",function(index,item){
        $(this).html(markdown.toHTML($(this).html()));
    });
');
?>
<div class="markdown">
<?=$post->content;?>
</div>
