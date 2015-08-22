<?php

namespace app\blog\controllers;
use Yii;
use yii\web\Controller;
use app\models\blog\Post;
use app\models\blog\PostSearch;
use app\models\blog\CategorySearch;
class DefaultController extends BaseController
{
    public function actionIndex()
    {

        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'data' => $dataProvider->query->all(),
        ]);
    }

    public function actionDetail($id)
    {
        $post = Post::findOne($id);
        if(!$post)
        {

        }
        else
        {
            return $this->render('detail',['post'=>$post]);
        }
    }

    public function actionCategory()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('category', [
            'data' => $dataProvider->query->all(),
        ]);
    }

    public function actionSearch()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'data' => $dataProvider->query->all(),
        ]);
    }
}
