<?php

namespace app\import\controllers;
use Yii;
use yii\web\Controller;
use app\models\CmsImg as Img;
use app\utils\word\Pullword;

class DefaultController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionImgs()
    {
        $data = Yii::$app->request->post('json');

        if(is_string($data))
        {   $data = str_replace("'", '"', $data);
            $data = json_decode($data,true);
        }
        if(!$data)
            return '';
        foreach ($data as $key => $item)
        {
           $img = Img::findOne(['src'=>$item['src']]);
           if(!$img)
           {
                $img = new Img();
                $img->src = $item['src'];
                $img->date = date('Y-m-d');
                $img->save();
           }
        }
    }
}
