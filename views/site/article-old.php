<?php

use yii\bootstrap\Modal;
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;



?>
<?php

/* @var $this yii\web\View */

$this->title = 'Сказки';

?>


<div class="site-article row">
    <section class="body-content col-md-12 books">

        <div class="row">

            <div class="col-12 col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 site-article-title">
                <h3><?=$article->title?></h3>
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <img src="/images/index/<?=$article->image->image_path?>"
                     alt="<?=$article->title?>">
            </div>
            <div class="col-12 col-xs-6 col-sm-6 col-md-6 col-lg-6 site-article-all">
                <p id="date">дата написания: <span><?=$article->date?></span></p>
                <p id="year">год издания:  <span><?=$article->year?></span></p>
                <p id="pubhouse">издательство:  <span><?=$article->publishing_house?></span></p>
                <p id="site-count">количество страниц:  <span><?=$article->site_count?></span></p>
                <p id="img-count">количество иллюстраций:  <span><?=$article->img_count?></span></p>
                <p id="style">жанр:  <span><?=$article->style?></span></p>
                <p id="alt">возраст читателя:  <span><?=$article->alt?></span></p>
                <p id="price">цена в бумажном формате:  <span><?=$article->price?></span> грн</p>
                <p id="price_pdf">цена в pdf формате:  <span><?=$article->price_pdf?></span> грн</p>
                <p id="add_text"></p>


            </div>
        </div>
        <?php if(Yii::$app->session->hasFlash('liqpay-success')):?>
            <div class="alert alert-success">
                <p>Спасибо!!!</p>
                <p>
                    Ваш платеж успешно отправлен.
                </p>
            </div>
        <?php endif;?>
        <div class="row">
            <section id="read-contract" class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p>
                    Используя веб-сайт для покупки книги, вы соглашаетесь с
                    <a href="<?=Url::to(['site/contract'])?>" target="_blank">
                        договором купли-продажи</a>
                </p>
                </br>
                <p>
                    При покупке книги в pdf формате Вам на почту
                    будет отправлено сообщение о покупке через платёжную систему
                    <a href="https://www.liqpay.ua/ru" target="_blank">LiqPay</a>
                </p>
            </section>

            <button class="col-12 col-xs-3 col-sm-3 col-md-3 col-lg-3 btn">
                <a href="<?=Url::to("/web/pdf/{$article->pdf}", 'http')?>" target="_blank">читать отрывок</a>
            </button>
            <button class = "col-12 col-xs-4 col-sm-4 col-md-4 col-lg-4 btn buy">
                <a href="<?=Url::to(["site/contact"])?>">куПить бумажную книгу</a>
            </button>
            <form method="POST" action="https://www.liqpay.ua/api/3/checkout" accept-charset="utf-8" target="_blank">
                <input
                        type="hidden"
                        name="data"
                        value=<?=$data?>
                />
                <input
                        type="hidden"
                        name="signature"
                        value=<?=$signature?>
                />
                <button class="col-12 col-xs-4 col-sm-3 col-md-3 col-lg-3  btn buy_pdf">
                    <a>
                        <input type="image" name="order" src="//static.liqpay.ua/buttons/p1ru.radius.png" alt="" hidden/>
                        купить книгу в pdf
                    </a>
                </button>

            </form>


        </div>
        <div class="row">
            <div class="col-12 col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 about-me-description">
                <?= $article->description?></div>
        </div>
        <div class="row comments">

            <?php if($comments):?>
                <?php foreach ($comments as $comment):?>

                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 media row">
                        <div class="media-left media-middle">
                            <div class="doter" aria-hidden="true"></div>
                            <p><?=$comment->user->first_name?></p>
                        </div>
                        <div class="media-body">
                            <p class="media-heading"><?=$comment->comment?></p>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
            <?php if(Yii::$app->session->hasFlash('comment-success')):?>
                <div class="alert alert-success">
                    <p>Спасибо!!!</p>
                    <p>
                        Ваш коментарий успешно отправлен.
                    </p>
                </div>
            <?php else: ?>
                <div class="col-12 col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <h4 class="text-center">Напишите комментарий</h4>
                    <?php $form = ActiveForm::begin(['id'=>'comment_form', 'method'=>'post'])?>
                    <?=$form->field($user_new,'first_name')->textInput(['placeholder'=>'Имя'])->label('')?>
                    <?=$form->field($comment_new,'comment')->textarea(['rows'=>4,'placeholder'=>'Комментарии'])->label('')?>
                    <div class="form-group">
                        <div class="col-12 col-xs-8 col-sm-12 col-md-11 col-lg-12 form-group">
                            <?= Html::submitButton('ОТПРАВИТЬ', ['class' => 'btn btn-success', 'name' => 'register-button']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end()?>
                </div>
            <?php endif; ?>
        </div>

    </section>
    <?php
    Modal::begin([
        'header' => '<h2>Hello world</h2>',
        'options' => [
            'id' => 'modal-contact',
            'class' => 'modal-contact',
        ],
        'toggleButton' => [
            'label' => 'click me',
            'tag' => 'button',
            'class' => 'btn btn-success',
        ],
        'footer' => 'Низ окна',
    ]);
    ?>
    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

    <?= $form->field($user_new, 'first_name')->textInput(['autofocus' => true]) ?>

    <?= $form->field($user_new, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php Modal::end(); ?>
</div>


