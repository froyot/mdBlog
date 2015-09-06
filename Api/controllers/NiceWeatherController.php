<?php

namespace app\Api\controllers;
use Yii;
use yii\rest\Controller;

class NiceWeatherController extends Controller
{
    public $modelClass = 'app\models\api\NiceWeather';
    public $dataModel = null;

    function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->dataModel = new $this->modelClass();
        $this->dataModel->load(Yii::$app->request->get());
    }

    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $forecasts = $this->dataModel->forecast;
        return $forecasts;
    }



}
