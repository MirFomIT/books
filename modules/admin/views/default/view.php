<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */


$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<section class="admin-article-view books">

    <p>
        <?= Html::a('Update', ['update', 'id' => $article->id], ['class' => 'btn btn-primary admin-btn']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $article->id], [
            'class' => 'btn btn-danger admin-btn',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <section>
        <div>
                        <div class="col-md-4 img"><img src="/images/<?=$article->image->image_path?>" style="height: 15em"></div>
                        <div class="col-md-6">
                            <div class="title"><h3><?=$article->title?></h3></div>
                            <div class="keywords"><?=$article->key_words?></div>
                            <div class="pub_house"><?=$article->publishing_house?></div>
                            <div class="row">
                                <div class="col-md-5 style"><?=$article->style?></div>
                                <div class="col-md-5 pdf"><?=$article->pdf?></div>
                                <div class="col-md-1 new"><?=$article->new?></div>
                                <div class="col-md-1 year"><?=$article->year?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 description"><?=$article->description?></div>
                    </div>
                    <hr/>

    </section>

</section>
