<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $description
 * @property string $key_words
 * @property string $description_meta
 * @property string $title
 * @property string $new
 * @property int $image_id
 * @property string $date_create
 * @property string $date_update
 * @property string $year
 * @property string $publishing_house
 * @property string $pdf
 * @property string $style
 * @property string $date
 * @property string $site_count
 * @property string $img_count
 * @property string $alt
 * @property string $pdf_price
 *
 * @property Image $image
 * @property Comment[] $comments
 * @property Video[] $videos
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description_text', 'description_meta', 'key_words', 'new', 'alt'], 'string'],
            [['title', 'style'], 'required'],
            [['image_id','site_count','img_count'], 'integer'],
            [['pdf'],'file', 'extensions' => 'pdf','message' => 'Файл должен быть в формате pdf'],
            [['year'], 'safe'],
            [['price_pdf','price'],'double'],
            [['title', 'date', 'date_create', 'date_update', 'publishing_house','style'], 'string', 'max' => 255],
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
            'description_text' => 'Краткое описание',
            'key_words' => 'Ключевые слова',
            'description_meta' =>'Описание страницы',
            'title' => 'Заголовок',
            'description' =>'Краткое описание книги',
            'new' => 'Новинка',
            'image_id' => 'Каринка',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'year' => 'Год издания',
            'publishing_house' => 'Издательство',
            'pdf' => 'Pdf файл ',
            'style' => 'Жанр',
            'site_count' =>'Количество страниц',
            'img_count' =>'Количество картинок',
            'alt' => 'Возрастная категория',
            'price_pdf'=>'Цена книги в формате pdf',
            'price' =>'Цена книги в бумажном формате'

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(Video::className(), ['article_id' => 'id']);
    }
}
