<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Новости';
$this->params['breadcrumbs'][] = ['label' => 'О кинотеатре', 'url' => ['site/about']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-about">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Здесь будут новости</p>
    
    <code><?= __FILE__ ?></code>
</div>
