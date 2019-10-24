<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */


$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<section class="row admin-article-view books">

    <p>
        <?= Html::a('Update', ['update', 'id' => $article->id], ['class' => 'btn btn-primary admin-btn']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $article->id], [
            'class' => 'btn btn-danger admin-btn',
            'data' => [
                'confirm' => 'Удалить эту статью?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <section class="body-content books">

        <div class="row">

            <div class="col-12 col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 site-article-title">
                <h3><?=$article->title?></h3>
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <img src="/images/<?=$article->image->image_path?>"
                     alt="<?=$article->title?>">
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 site-article-all">
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

        <div class="row">
            <div class="col-12 col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 about-me-description"><?= $article->description?></div>

        </div>

    </section>

</section>
