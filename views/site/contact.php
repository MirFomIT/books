<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="contact row">
    <section class="col-md-12 books">

        <u><h1><?= Html::encode($this->title) ?></h1></u>


        <p id="phone"><?= $user->phone?></p>
        <a href="<?=Url::to(['site/contract'])?>" style="color: #25611b" target="_blank">договор купли-продажи</a>


        <?php if (Yii::$app->session->hasFlash('contact-success')): ?>

            <div class="alert alert-success">
                <p>Спасибо!!!</p>
                <p>Ваше сообщение успешно отправлено.</p>
                <p>Я свяжусь с Вами в ближайшее время!!!</p>
            </div>
        <?php else: ?>


            <div class="row">
                <div class="col-xs-8 col-xs-offset-2 col-lg-8 col-lg-offset-2 contacts">

                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <div class="col-xs-8 col-xs-offset-2 col-lg-8 col-lg-offset-2">

                        <?= $form->field($model, 'name')->textInput(['autofocus' => true,'placeholder'=>'Имя'])->label('') ?>

                        <?= $form->field($model, 'email')->textInput(['placeholder'=>'E-mail'])->label('') ?>

                    </div>
                    <div class="col-md-12">
                    <?= $form->field($model, 'body')->textarea(['rows' => 6, 'placeholder'=>'Сообщение'])->label('')?>
                    </div>
                    <div class="col-lg-6 col-lg-offset-3 form-group">
                        <?= Html::submitButton('ОТПРАВИТЬ', ['class' => 'btn btn-success', 'name' => 'contact-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="col-lg-6 col-lg-offset-3 delivery">
                    <p> Возможные способы доставки:</p>
                    <div class="media">
                        <div class="media-left media-middle media-middle-contact">
                            <div class="doter" aria-hidden="true"></div>
                            <p>Нова пошта</p>
                            <div class="doter" aria-hidden="true"></div>
                            <p>Укрпошта</p>
                        </div>
                        <img src="/images/master_visa.png">
                    </div>
                    <p> Оплата наложенным платежом</p>
                    <p> Подробности по телефону:</p>
                    <p id="phone"><?= $user->phone?></p>
                </div>
            </div>

        <?php endif; ?>
    </section>
</section>

