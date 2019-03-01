<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 12:19
 */

use yii\helpers\Html;

$this->title = 'Афиша';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cinema-affiche">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Здесь будет список фильмов</p>

    <p><a href="<?= \yii\helpers\Url::to(['cinema/film', 'id' => 123]) ?>">Перейти к карточке фильма</a></p>

    <code><?= __FILE__ ?></code>
</div>