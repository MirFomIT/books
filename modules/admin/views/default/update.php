<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = 'Update Article: ' . $article->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $article->title, 'url' => ['view', 'id' => $article->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="admin-article-update books">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('article','image')) ?>

</section>
