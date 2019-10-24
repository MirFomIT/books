<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\Video;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Article;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link rel="shortcut icon" href="/images/logo.png" type="image/png">
</head>
<body style="overflow-y: auto">
<?php $this->beginBody() ?>
<?php
$video_news = Video::find()->where(['new'=>1])->all();
$videos = Video::find()->where(['new'=>0])->all();
?>

<div class = "row">
    <nav class="navbar">
        <div class="col-md-10">

            <section class="brand">
                блог Ирины Мальчуковой
            </section>
            <!--MENU-->
            <nav class="collapse navbar-collapse nav navbar-nav navbar-right">
                <ul class="nav-menu-top navbar-nav">
                    <li><?=Html::a('ГЛАВНАЯ',['/admin'])?></li>
                    <li><?=Html::a('СТАТЬИ',['/admin-article'])?></li>
                    <li class="dropdown">
                        <a href="#"
                           class="dropdown-toggle"
                           data-toggle="dropdown"
                           role="button"
                           aria-haspopup="true"
                           aria-expanded="false">АНТРЕСОЛИЯ<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=Url::to(['/admin-about-me']);?>">О себе</a></li>
                            <li><a href="<?=Url::to(['/admin-first-story']);?>"">Первая сказка</a></li>
                        </ul>
                    </li>
                    <li><?=Html::a('ВИДЕО',['/admin-video'])?></li>
                </ul>
            </nav>
        </div>
        <div class="col-md-2 login_register">
            <div class="col-md-12 collapse navbar-collapse nav navbar-nav navbar-right">
                <ul class="nav-menu-top navbar-nav">


                    <?php if(!Yii::$app->user->isGuest):?>
                        <li>
                           <a href="<?=Url::home()?>">на сайт</a>
                        </li>
                    <?php endif;?>

                </ul>
            </div>
        </div>
    </nav>
    <section class="logo">
        <div class="col-md-2">
            <img src="/images/logo.png" alt="" id="logo">
        </div>
    </section>
</div>

<div class="container">
    <div class="row main">
        <section class="col-md-12">
            <?= $content ?>
        </section>
    </div>
</div>



<footer class="footer row" style="text-align: center">
    <div class="col-md-4">
        <a href="https://www.mirfomit.dp.ua"> <p>&copy; дизайн Светлана Фоменко</p></a>
    </div>
    <div class="col-md-4">
        <a href="https://www.mirfomit.dp.ua"><p>&copy; разработка Елена Мироненко</p></a>
    </div>
    <div class="col-md-4">
        <a href="https://www.mirfomit.dp.ua"> <p>&copy; художник Яна Копосова</p></a>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
