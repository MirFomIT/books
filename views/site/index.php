<?php
use yii\bootstrap\Modal;use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php

/* @var $this yii\web\View */

$this->title = 'Мальчукова Ирина';
?>
<div class="site-index row">
    <section class="row">
        <div class="owl-carousel owl-theme">
                    <?php foreach ($articles as $article):?>
                        <div class="books_img">
                            <a href="<?=Url::to(["article/{$article->id}"])?>">
                                <img src="/images/index/<?=$article->image->image_path?>" alt="<?=$article->title?>">
                            </a>
                            <section class="article_description_substrate">
                                <p class="article_description"><?=$article->description?></p>
                                <a href="<?=Url::to(["article/{$article->id}"])?>">
                                    <i class="read-more">читать далее...</i>
                                </a>
                            </section>

                        </div>
                    <?php endforeach;?>
        </div>
    </section>

<?php if(!$session->has('modal_window')):?>
    <section class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 modal-window">
        <?php
        Modal::begin([
        ]);
        ?>
        <div  id="example">

        </div>
        <?php
        Modal::end();
        ?>
    </section>

    <?php endif;?>
</div>



