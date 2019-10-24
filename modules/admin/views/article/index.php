<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php
/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Все статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-article-index books">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success admin-btn']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <section>
        <?php if($articles):?>
    <?php foreach ($articles as $article):?>

        <div class="row">
            <div class="col-md-4 img"><img src="/images/<?=$article->image->image_path?>" style="height: 15em"></div>
            <div class="col-md-6">
                <div class="title"><h3><?=$article->title?></h3></div>
                <div class="keywords"><?=$article->key_words?></div>
                <div class="pub_house"><?=$article->publishing_house?></div>
                <div class="row">
                    <div class="col-md-5 style"><span>жанр: </span><?=$article->style?></div>
                    <div class="col-md-5 pdf"><?=$article->pdf?></div>
                    <div class="col-md-1 new"><?=$article->new?></div>
                    <div class="col-md-1 year"><span>год написания: </span><?=$article->year?></div>
                </div>
            </div>
            <div class="col-md-2 crud_btn">
                <a href="<?=Url::to(['article/view','id'=>$article->id])?>"
                   title="View"
                   aria-label="View"
                   data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span>
                </a>
                <a href="<?=Url::to(['article/update','id'=>$article->id])?>"
                   title="Update"
                   aria-label="Update"
                   data-pjax="0"><span class="glyphicon glyphicon-pencil"></span>
                </>
                <a href="<?=Url::to(['article/delete','id'=>$article->id])?>"
                   title="Delete"
                   aria-label="Delete"
                   data-pjax="0"
                   data-confirm="Are you sure you want to delete this item?"
                   data-method="post"><span class="glyphicon glyphicon-trash"></span>
                </a>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 description"><?=$article->description?></div>
        </div>
    <hr/>

    <?php endforeach;?>
<?php endif;?>
    </section>
</div>
