<?php
use yii\helpers\Url;
$this->registerJsFile('@web/js/blog/ace.js',['depends'=>'yii\web\JqueryAsset']);
$this->registerjsFile('@web/js/blog/markdown.js',['depends'=>'yii\web\JqueryAsset']);
$this->registerJsFile('@web/js/blog/frontpage.js',['depends'=>'yii\web\JqueryAsset']);
?>
<script type="text/javascript">
url = "<?=Url::to(['ajax/posts']);?>";
</script>

<div id="posts">

</div>
