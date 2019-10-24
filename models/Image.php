<?php

namespace app\models;
use yii\web\UploadedFile;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property string $image_path
 * @property string $date_create
 * @property string $date_update
 * @property int $is_slider
 *
 * @property Article[] $articles
 * @property User[] $users
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image_path'], 'file', 'extensions' => 'jpg, png','message' => 'Файл должен быть в формате jpg или png'],
            [['date_create', 'date_update'], 'safe'],
            [['is_slider'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_path' => 'Титульная картинка',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'is_slider' => 'Is Slider',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['image_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocials()
    {
        return $this->hasMany(Social::className(), ['image_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['image_id' => 'id']);
    }
}
