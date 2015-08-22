<?php
use app\common\widgets\ListView;
use yii\helpers\Url;

?>
<?php foreach($data as $model):?>
<div class="markdown">
    <a href="<?=Url::to(['default/search','category_id'=>$model->id]);?>">
<?=$model->name;?>
&gt;&gt;&gt;
</a>
</div>


<hr>
<br/>
<?php endforeach;?>





