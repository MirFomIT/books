<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay".
 *
 * @property int $id
 * @property int $user_id
 * @property int $article_id
 * @property int $payment_system_id
 *
 * @property Article $article
 * @property PaymentSystem $paymentSystem
 * @property User $user
 */
class Pay extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pay';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'article_id', 'payment_system_id'], 'integer'],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'id']],
            [['payment_system_id'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentSystem::className(), 'targetAttribute' => ['payment_system_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'article_id' => 'Article ID',
            'payment_system_id' => 'Payment System ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentSystem()
    {
        return $this->hasOne(PaymentSystem::className(), ['id' => 'payment_system_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
