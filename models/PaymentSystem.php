<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment_system".
 *
 * @property int $id
 * @property string $payment_system_name
 * @property string $date_create
 * @property string $date_update
 *
 * @property Article[] $articles
 * @property Pay[] $pays
 */
class PaymentSystem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_system';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_system_name'], 'required'],
            [['date_create', 'date_update'], 'safe'],
            [['payment_system_name'], 'string', 'max' => 255],
            [['payment_system_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_system_name' => 'Payment System Name',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['pub_sys_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPays()
    {
        return $this->hasMany(Pay::className(), ['payment_system_id' => 'id']);
    }
}
