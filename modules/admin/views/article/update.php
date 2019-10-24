<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = 'Редактирование : ' . $article->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $article->title, 'url' => ['view', 'id' => $article->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="admin-article-update books">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', compact('article','image')) ?>

</section>
