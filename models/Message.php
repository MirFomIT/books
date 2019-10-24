<?php


namespace app\models;
use Yii;
use yii\db\ActiveRecord;


class Message extends ActiveRecord
{
    public static function tableName()
{
    return 'message';
}

    public  function rules()
    {
        return [
            ['message_text','safe'],
            [['user_id'],'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' =>'id',
            'message_text' =>'Сообщение',
            'user_id' => 'Имя'
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}