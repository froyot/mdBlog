<?php

namespace app\admin\controllers;

use Yii;
use app\models\blog\Category;
use app\models\blog\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class BaseController extends Controller
{
    public $layout = 'admin';
}
