<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 12:19
 */

use yii\helpers\Html;

$this->title = 'Карточка фильма';
$this->params['breadcrumbs'][] = $this->title;

/**@var array $film */
?>
<div class="cinema-film">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php

    var_dump($film);

    ?>
</div>