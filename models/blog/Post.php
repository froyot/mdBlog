<?php

namespace app\models\blog;

use Yii;

/**
 * This is the model class for table "md_post".
 *
 * @property integer $id
 * @property string $title
 * @property string $abstruct
 * @property string $content
 * @property string $date
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'md_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'date' => 'Date',
        ];
    }

    public function getTitle()
    {
        $ind = strpos($this->content,"\n");
        return substr($this->content, 0,$ind);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelations()
    {
        return $this->hasOne(Relation::className(), ['post_id'=>'id']);
    }

}
