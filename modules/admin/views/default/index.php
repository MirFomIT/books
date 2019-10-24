<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<?php
/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Первая страница';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="row admin-article-index books">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php $form = ActiveForm::begin(); ?>
                <section class="col-md-12  quote">

                    <blockquote class="blockquote-reverse" style="text-align: center">

                        <p>
                            <?= $form->field($quote, 'quote_text')->textarea(['rows'=>4]) ?>
                        </p>
                    </blockquote>
                    <div data-label="" class="crud-admin-quote">
                        <!--сохранить выбранной цитаты с автором-->
                        <?= Html::submitButton('сохранить', ['class' => 'btn btn-warning', 'name' => 'save-admin-quote-button']) ?>

                    </div>
                </section>
    <?php ActiveForm::end();?>
    <!--просмотр всех цитат с автором-->

        <section class="col-md-12 books-article">

                    <?php foreach ($articles as $article):?>
                        <div class="col-lg-4 books_img">
                            <a href="<?=Url::to(["article/{$article->id}"])?>">
                                <img src="/images/<?=$article->image->image_path?>" alt="<?=$article->title?>">
                            </a>
                            <p class="article_description"><?=$article->description?></p>

                                <div class="crud_btn" style="margin-top: 2em">
                                    <a href="<?=Url::to(['article/update','id'=>$article->id])?>"
                                       aria-label="Update"
                                       data-pjax="0">
                                        <button class="btn btn-info">Обновить</button>
                                    </a>
                                    <a href="<?=Url::to(['article/delete','id'=>$article->id])?>"
                                       title="Delete"
                                       aria-label="Delete"
                                       data-pjax="0"
                                       data-confirm="Are you sure you want to delete this item?"
                                       data-method="post">
                                        <button class="btn btn-danger">Удалить</button>
                                    </a>
                                </div>

                        </div>
                    <?php endforeach;?>
         </section>

</section>
