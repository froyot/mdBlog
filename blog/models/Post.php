<?php

namespace app\blog\models;

use Yii;
use app\models\blog\Post as PostModel;
use app\models\blog\Relation;
use yii\helpers\Url;
/**
 * This is the model class for table "md_post".
 *
 * @property integer $id
 * @property string $title
 * @property string $abstruct
 * @property string $content
 * @property string $date
 */
class Post extends \yii\base\Model
{
    public function getPosts()
    {
        $count = 20;
        $page = 1;
        $query = PostModel::find();
        $posts = $query->offset(($page-1)*$count)
                    ->orderBy('date desc')
                    ->limit($count)
                    ->asArray()
                    ->all();
        if(!$posts)
        {

            return [];
        }
        $arrays = [];
        foreach ($posts as $key => $item)
        {
            $item['url'] = Url::to(['default/detail','id'=>$item['id']]);
            $category = Post::getCategoryInfo($item['id']);
            $item['category_id'] = $category['id'];
            $item['category_name'] = $category['name'];
            $item['category_url'] = Url::to(['default/search','category_id'=>intval($item['category_id'])]);
            $arrays[] = $item;
        }
        return $arrays;
    }

    public function getCategoryInfo($id)
    {
        $category = [
            'id'=>0,
            'name'=>'Default',
        ];
        $relation = Relation::find()->With('category')
                    ->where(['post_id'=>$id])->one();
        if($relation)
        {
            $category['id'] = $relation->category_id;
            $category['name'] = $relation->category->name;
        }
        return $category;
    }
}

