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

/**@var array $films */
?>
<div class="cinema-affiche">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php foreach ($films as $film): ?>
    <div class="film-preview">
        <p><?= $film['date'] ?></p>
        <p><img src="/posters/<?= $film['id'] ?>/<?= $film['rank'] ?>/preview.jpg" alt="Нет постера"></p>
        <p><a href="<?= \yii\helpers\Url::to(['cinema/film', 'id' => $film['id']]) ?>"><?= $film['name'] ?></a></p>
        <p><?= $film['age'] ?>+</p>
    </div>
    <?php endforeach; ?>

</div>