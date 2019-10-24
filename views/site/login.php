<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Логин';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login row">
    <section class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 books">
<h3><?=$this->title?></h3>
    <p>Пожалуйста, заполните следующие поля для входа:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "<div class=\"col-12 col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3\">{input}</div>\n<div class=\"col-12 col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3\">{error}</div>",
            'labelOptions' => ['class' => 'col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>'Имя']) ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Пароль']) ?>

        <div class="form-group">
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <?= Html::submitButton('Вход', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
    </section>
</div>
