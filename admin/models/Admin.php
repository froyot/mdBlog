<?php

namespace app\admin\models;

use Yii;

/**
 * This is the model class for table "md_admin".
 *
 * @property integer $id
 * @property string $name
 * @property string $password
 */
class Admin extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $authKey = '';
    public $accessToken = '';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'md_admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'password'], 'required'],
            [['name', 'password'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'password' => 'Password',
        ];
    }

   
    public function getUsername()
    {
        return $this->name;
    }
    

  public static function findIdentity($id)
    {
      return static::findOne($id);
    }

    public static function findIdentityByAccessToken($access_token, $type = null)
    {
        return false;
    }

    public function getId()
    {
      return $this->id;
    }

    public function getAuthKey()
    {
      return $this->id;
    }

    public function validateAuthKey($authKey)
    {
      return false;
    }

    public function validatePassword($password)
    {
      return Yii::$app->security->validatePassword($password, $this->password);
    }


    public static function findByUsername($name)
    {
        $user = Admin::findOne(['name'=>$name]);
        return $user;
    }

}
