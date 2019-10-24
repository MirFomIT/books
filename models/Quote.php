<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quote".
 *
 * @property int $id
 * @property string $quote_text
 * @property string $quote
 */
class Quote extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quote';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quote_text', 'quote'], 'required'],
            [['quote_text', 'quote'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quote_text' => 'Цитата',
            'quote' => 'Цитата/Модальное окно',
        ];
    }
}
