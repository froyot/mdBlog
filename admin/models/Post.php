<?php

namespace app\admin\models;

use Yii;
use app\models\blog\Post as PostModel;
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
class Post extends \yii\base\Model
{
    public $id;
    public $content;
    public $date;

    public $category_id;
    public $isNewRecord = true;
    public function rules()
    {
        return [
            [['content'],'required','on'=>['create','update']],
            ['category_id','number'],
            ['id','required','on'=>'delete'],
            ['date','date','format'=>'yyyy-MM-dd'],
            ['date','default','value'=>date('Y-m-d')],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'date' => 'Date',
            'category_id' => 'Category',
        ];
    }
    /**
     * 添加文章
     */
    public function create()
    {
        $postModel = new PostModel();

        $postModel->attributes = [
            'content'=>$this->content,
            'date'=>$this->date,
        ];
        $res = $postModel->save();
        if($res)
        {
            $relation = new Relation();
            $relation->post_id = $postModel->primaryKey;
            $relation->category_id = $this->category_id;
            $re = $relation->save();
            if(!$re)
            {
                Yii::error($relation->errors);
            }
        }
        $this->id = $postModel->primaryKey;
        return $res;
    }

    /**
     * 更新文章
     */
    public function update()
    {
        $postModel = PostModel::findOne($this->id);
        if(!$postModel)
        {
            return false;
        }

        $postModel->attributes = [

            'content'=>$this->content,
            'date'=>$this->date,

        ];
        $res = $postModel->save();
        if( $res !== false )
        {
            $relation = Relation::findOne([
                'post_id'=>$postModel->primaryKey,
                'cat_id'=> $this->category_id,
                ]);
            if(!$relation)
            {//不存在，删除原有的
                Relation::deleteAll(['post_id'=>$postModel->primaryKey]);
                $relation = new Relation();
                $relation->post_id = $postModel->primaryKey;
                $relation->cat_id = $this->category_id;
                $relation->save();
            }
        }
        return $res !== false;
    }

    public function delete()
    {
        $postModel = PostModel::findOne($this->id);
        if(!$postModel)
        {
            return false;
        }
        Relation::deleteAll(['post_id'=>$postModel->primaryKey]);
        return $postModel->delete();
    }

    public function findOne($id)
    {
        $post = PostModel::findOne($id);
        if(!$post)
        {
            return null;
        }
        $model = new Post();
        $model->content = $post->content;
        $model->date = $post->date;
        $model->id = $post->id;
        $relation = Relation::findOne(['post_id'=>$post->primaryKey]);
        if($relation)
        {
            $model->category_id = $relation->category_id;
        }
        return $model;
    }

    public function getTitle()
    {
        $post = PostModel::findOne($this->id);
        if(!$post)
        {
            return null;
        }
        return $post->title;
    }

}
