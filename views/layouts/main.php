<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\Quote;
use app\models\Social;
use app\models\Video;
use app\widgets\Alert;
use yii\bootstrap\Modal;
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
    <meta name="interkassa-verification" content="e23451b569ad26d5347fddc117675728" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link rel="shortcut icon" href="/images/logo.png" type="image/png">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>
</head>
<body>
<?php $this->beginBody() ?>
<?php
$video_news = Video::find()->where(['new'=>1])->all();
$videos = Video::find()->where(['new'=>0])->all();
$socials = Social::find()->where(['!=','path','NULL'])->all();
?>

<?php $this->endBody() ?>
   <div class = "row">
       <nav class="navbar">

            <div class="col-md-10">

              <section class="brand">
                  блог Ирины Мальчуковой
              </section>
              <!--MENU-->
              <nav class="collapse navbar-collapse nav navbar-nav navbar-right nav-menu">

                  <ul class="nav-menu-top navbar-nav">
                      <li><a href="<?=Url::home()?>">ГЛАВНАЯ</a></li>
                      <li class="dropdown">
                          <a href="#"
                             class="dropdown-toggle"
                             data-toggle="dropdown"
                             role="button"
                             aria-haspopup="true"
                             aria-expanded="false">АНТРЕСОЛИЯ<span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                               <li><a href="<?=Url::to(['site/about-me']);?>">О себе</a></li>
                              <li><a href="<?=Url::to(['site/first-story']);?>"">Первая сказка</a></li>
                          </ul>
                      </li>
                      <li class="dropdown">
                          <a href="#"
                             class="dropdown-toggle"
                             data-toggle="dropdown"
                             role="button"
                             aria-haspopup="true"
                             aria-expanded="false">МОИ КНИГИ<span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                              <?php $articles = Article::find()->all();?>
                              <?php foreach ($articles as $article):?>
                              <li><a href="<?=Url::to(["article/{$article->id}"])?>" id="<?=$article->id?>"><?=$article->title?></a></li>
                              <?php endforeach;?>
                          </ul>
                      </li>
                      <li><?=Html::a('КОНТАКТЫ',['site/contact'])?></li>
                  </ul>
              </nav>
          </div>
            <div class="col-md-2 login_register">
              <div class="collapse navbar-collapse nav navbar-nav navbar-right">
                  <ul class=" navbar-nav">

                      <?php if(Yii::$app->user->isGuest):?>
                          <li id="login_li"><?=Html::a('войти',['site/login'])?></li>
                      <?php endif; ?>
                      <?php if(!Yii::$app->user->isGuest):?>
                          <?php if(Yii::$app->user->identity['last_name'] == 'Мальчукова'):?>
                              <li id="admin_li"><?=Html::a('администратор',['/admin/'])?></li>
                              <li id="admin_logout"><?=Html::a('logout',['site/logout'])?></li>
                          <?php endif;?>
                      <?php endif;?>

                  </ul>
              </div>
            </div>
           <!--Mobile menu-->
           <nav class=" mobilemenu">
               <section id="mobilemenu">
                   <input id="hamburger" class="hamburger" type="checkbox"/>
                   <label class="hamburger" for="hamburger">
                       <i></i>
                   </label>
                   <section class="drawer-list">
                       <ul class="nav agileits w3layouts navbar-nav">
                           <li><a href="<?=Url::home()?>">ГЛАВНАЯ</a></li>
                           <li class="dropdown">
                               <a href="#"
                                  class="dropdown-toggle"
                                  data-toggle="dropdown"
                                  role="button"
                                  aria-haspopup="true"
                                  aria-expanded="false">АНТРЕСОЛИЯ<span class="caret"></span>
                               </a>
                               <ul class="dropdown-menu">
                                   <li><a href="<?=Url::to(['site/about-me']);?>">О себе</a></li>
                                   <li><a href="<?=Url::to(['site/first-story']);?>"">Первая сказка</a></li>
                               </ul>
                           </li>
                           <li class="dropdown">
                               <a href="#"
                                  class="dropdown-toggle"
                                  data-toggle="dropdown"
                                  role="button"
                                  aria-haspopup="true"
                                  aria-expanded="false">МОИ КНИГИ<span class="caret"></span>
                               </a>
                               <ul class="dropdown-menu">
                                   <?php $articles = Article::find()->all();?>
                                   <?php foreach ($articles as $article):?>
                                       <li><a href="<?=Url::to(["article/{$article->id}"])?>" id="<?=$article->id?>"><?=$article->title?></a></li>
                                   <?php endforeach;?>
                               </ul>
                           </li>
                           <li><?=Html::a('КОНТАКТЫ',['site/contact'])?></li>
                            <?php if(Yii::$app->user->isGuest):?>
                                   <li id="login_li"><?=Html::a('войти',['site/login'])?></li>
                               <?php endif; ?>
                               <?php if(!Yii::$app->user->isGuest):?>
                                   <?php if(Yii::$app->user->identity['last_name'] == 'Мальчукова'):?>
                                       <li id="admin_li"><?=Html::a('администратор',['/admin/'])?></li></br>
                                       <li id="admin_li"><?=Html::a('logout',['site/logout'])?></li>
                                   <?php endif;?>
                               <?php endif;?>
                       </ul>
                   </section>
               </section>
           </nav>
           <!--//Mobile menu-->
        </nav>
       <section class="logo">
           <div class="col-md-2">
               <a href="<?=Url::home()?>"><img src="/images/logo.png" alt="" id="logo"/></a>
           </div>
        </section>
   </div>

   <div class="container">

       <div class="row main">
           <section class="col-xs-7 col-sm-9 col-md-9 left_section">

               <section class="col-md-12 quote">
                   <?php $quote = Quote::find()->where(['quote'=>'0'])->one();?>
                   <p class="blockquotes">
                            <?=$quote->quote_text?>
                       </p>
               </section>

               <?= $content ?>
           </section>

           <?php if($video_news):?>
              <section class="col-xs-5 col-sm-3 col-md-3 right_section ">
                  <div class="col-md-12 right_section_my_video">
                      <?php foreach ($video_news as $video_new):?>
                          <div class="col-md-12 video">
                              <?=$video_new->path?>
                              <!--<iframe
                                      src="https://www.youtube.com/embed/MO_BnnHMCf4?start=4"
                                      frameborder="0"
                                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                      allowfullscreen>
                              </iframe>-->
                          </div>
                      <?php endforeach;?>
                  </div>
             </section>
           <?php endif;?>
       </div>
       <?php if($videos):?>
           <section>
               <section class="col-md-9 row bottom-block-advertising">
                  <div class="col-12 col-sm-12 col-xs-3 col-md-5 video">
                      <iframe
                              src="https://www.youtube.com/embed/effkoBQqm7g"
                              frameborder="0"
                              allow="accelerometer;
                              autoplay;
                              encrypted-media;
                              gyroscope;
                              picture-in-picture" allowfullscreen>

                      </iframe>
                  </div>
                  <div class="col-12 col-sm-12 col-xs-3 col-md-5 video">
                       <iframe
                               src="https://www.youtube.com/embed/effkoBQqm7g"
                               frameborder="0"
                               allow="accelerometer;
                              autoplay;
                              encrypted-media;
                              gyroscope;
                              picture-in-picture" allowfullscreen>

                       </iframe>
                   </div>
               </section>
           </section>
       <?php endif;?>
   </div>


<footer class="row footer">
    <div class="col-md-4">
        <a href="https://www.mironenkosoft.dp.ua" target="_blank"><p style="color: green">разработка Елена Мироненко</p></a>
    </div>
    <?php if($socials):?>
    <div class="col-md-4">
        <?php foreach ($socials as $social):?>
        <a href="<?=$social->path?>" target="_blank"><img src="/images/social/<?=$social->image->image_path?>" class="social"></a>
        <?php endforeach;?>
    </div>
    <?php endif;?>
    <div class="col-md-4">
        <a href="#" target="_blank"><p style="color: green">дизайн Светлана Фоменко</p></a>
    </div>
</footer>


</body>
<script>

    /*carousel*/

    $(function() {
        // Owl Carousel
        var owl = $(".owl-carousel");
        owl.owlCarousel({
            items: 3,
            margin: 40,
            loop: true,
            nav: true
        });
    });
    /*end carousel*/
</script>
</html>
<?php $this->endPage() ?>
