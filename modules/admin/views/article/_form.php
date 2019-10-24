<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<section class="article-form row">

    <?php $form = ActiveForm::begin(); ?>


            <div class="row">
                <div class="col-md-4 img">
                    <?php if($article->image_id):?>
                        <img src="/images/<?=$article->image->image_path?>" style="height: 25em"/>
                    <?php endif;?>
                    <?= $form->field($image, 'image_path')->fileInput();?>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <div class="title">
                        <?= $form->field($article, 'title')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="keywords">
                        <?= $form->field($article, 'key_words')->textarea(['rows' => 3]) ?>
                    </div>
                    <div class="description-meta">
                        <?= $form->field($article, 'description_meta')->textarea(['rows' => 3]) ?>
                    </div>
                    <div class="style">
                        <?= $form->field($article, 'style')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="pub_house">
                       <?= $form->field($article, 'publishing_house')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
             <div class="row">

                 <div class="col-md-4 pdf">
                    <?= $form->field($article, 'pdf')->fileInput()?>
                 </div>
                 <div class="col-md-2 new">
                     <?= $form->field($article, 'new')->dropDownList([ 1 => 'да', 0 => 'нет', ]) ?>
                 </div>
                 <div class="col-md-2 year">
                    <?= $form->field($article, 'year')->textInput(['maxlength' => true]) ?>
                 </div>
                 <div class="col-md-2 price">
                     <?= $form->field($article, 'price')->textInput(['maxlength' => true]) ?>
                 </div>
                 <div class="col-md-2 date">
                     <?= $form->field($article, 'date')->textInput(['maxlength' => true]) ?>
                 </div>
                 <div class="col-md-2 site-count">
                     <?= $form->field($article, 'site_count')->input('number') ?>
                 </div>
                 <div class="col-md-2 img-count">
                     <?= $form->field($article, 'img_count')->input('number') ?>
                 </div>
                 <div class="col-md-2 alt">
                     <?= $form->field($article, 'alt')->textInput(['maxlength' => true]) ?>
                 </div>
                 <div class="col-md-2 price-pdf">
                     <?= $form->field($article, 'price_pdf')->textInput(['maxlength' => true]) ?>
                 </div>
            </div>
            <div class="row">
                <div class="centered">
                </div>
                <div class="col-md-12 description centered">
                    <?= $form->field($article, 'description')->textarea(['rows' => 10,'id' => 'editor']) ?>
                </div>
            </div>
            <hr/>

        <div class="form-group">
          <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</section>
<script src="/js/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( err => {
            console.error( err.stack );
        } );

</script>
