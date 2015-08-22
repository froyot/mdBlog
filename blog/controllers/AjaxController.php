<?php

namespace app\blog\controllers;
use Yii;
use yii\web\Controller;

use app\blog\models\Post;
class AjaxController extends BaseController
{
    public $enableCsrfValidation = false;

    function __construct($id, $module, $config = [])
    {
        \Yii::$app->request->parsers = [
                  'application/json' => 'yii\web\JsonParser',
                  'text/json' => 'yii\web\JsonParser',
                  ];
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;//设置返回json对象
        return parent::__construct($id, $module, $config);
    }

    public function actionPosts()
    {
        $posts = Post::getPosts();
        return $posts;
    }
}
