<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $password_confirm
 * @property string $date_create
 * @property string $date_update
 * @property int $image_id
 * @property string $auth_key
 * @property string $phone
 *
 * @property Article[] $articles
 * @property Comment[] $comments
 * @property Pay[] $pays
 * @property Image $image
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'auth_key'], 'required', 'message'=>'поле не должно быть пустым'],
            [['date_create', 'date_update','phone'], 'safe'],
            [['image_id'], 'integer'],
            [['first_name', 'last_name', 'email', 'password', 'password_confirm', 'auth_key'], 'string', 'max' => 255],
            [['first_name'], 'unique'],
            [['last_name'], 'unique'],
            [['email'], 'unique'],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['image_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'password_confirm' => 'Password Confirm',
            'phone' =>'Телефон',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'image_id' => 'Image ID',
            'auth_key' => 'Auth Key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPays()
    {
        return $this->hasMany(Pay::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        /* foreach (self::$users as $user) {
             if ($user['accessToken'] === $token) {
                 return new static($user);
             }
         }

         return null;*/
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['first_name'=>$username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }
    public function generateAuthKey(){
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        //return $this->password === $password;
        return \Yii::$app->security->validatePassword($password,$this->password);
    }
}
