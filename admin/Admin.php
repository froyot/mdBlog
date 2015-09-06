<?php

namespace app\admin;

class Admin extends \yii\base\Module
{
    public $controllerNamespace = 'app\admin\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here

        \Yii::$app->user->identityClass = 'app\admin\models\Admin';
       
        \Yii::$app->user->loginUrl=[$this->id.'/public/login'];
    	
    }
}
