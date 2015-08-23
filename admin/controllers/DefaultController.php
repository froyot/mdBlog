<?php

namespace app\admin\controllers;

use yii\web\Controller;

class DefaultController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
