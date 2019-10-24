<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Article;
use app\models\Quote;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<section class="article-form row">

    <?php $form = ActiveForm::begin(); ?>

    <div class="site-index row">
        <section class="col-md-12 quote_select">
            <?=$form->field($quote,'quote_text')->dropDownList(
                Quote::find()
                    ->select('quote_text','quote_text')
                    ->indexBy('id')
                    ->column(),
                [
                    //'prompt'=>'Select Article',
                    'name'=>'select_quote',
                     'multiple' => 'multiple',
                    'id'=>'select_quote_id'
                ]
            )?>
        </section>
        <section class="col-md-12  quote">
            <blockquote class="blockquote-reverse">
                <p>
                    <?=$form->field($quote,'quote_text')->textarea(['row'=>3])?>
                </p>
                <footer><cite title="Source Title">
                        <?=$form->field($quote,'quote_author')->textInput()?>
                    </cite></footer>
            </blockquote>
        </section>
        <section class="col-md-10 col-md-offset-1 author_text">
            <p>
                <?=$form->field($quote,'quote_text')->textarea(['row'=>3])->label('текст автора')?>
            </p>
        </section>
        <section class="col-md-10 col-md-offset-1 video_bottom">
            <p>
                <?=$form->field($video,'path')->fileInput()?>
                <?=$form->field($quote,'quote')->checkbox([
                        ''
                ])?>
            </p>
        </section>

    </div>

    <div class="row">
        <div class="form-group">
          <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
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
