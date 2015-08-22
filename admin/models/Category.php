<?php

namespace app\admin\models;

use Yii;
use app\models\blog\Category as CategoryModel;
use app\models\blog\Relation;

/**
 * This is the model class for table "md_post".
 *
 * @property integer $id
 * @property string $title
 * @property string $abstruct
 * @property string $content
 * @property string $date
 */
class Category extends \yii\base\Model
{
    public function getCategorys()
    {

        $categorys = CategoryModel::find()->all();
        $cats = [];
        foreach ($categorys as $key => $item)
        {
            $cats[$item->id] = $item->name;
        }
        return $cats;
    }

}
