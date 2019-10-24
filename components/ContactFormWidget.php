<?php
namespace app\components;

use app\models\User;
use Yii;
use yii\base\Widget;
use app\models\ContactForm;

class ContactFormWidget extends Widget
{

public function run(){
    $user = User::find()->select(['phone'])->where(['last_name'=>'Мальчукова'])->one();

    $model = new ContactForm();
    // if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
    if ($model->load(Yii::$app->request->post())){
        Yii::$app->mailer->compose('mail',compact('model'))
            ->setFrom($model->email)
            ->setTo('iramalchukova@gmail.com')
            ->setSubject($model->body)
            ->send();

        Yii::$app->session->setFlash('contact-success');

        return $this->refresh();
    }
    return $this->render('contact-formWidget', compact('model','user'));

}
}