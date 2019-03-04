<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 04.03.19
 * Time: 15:21
 */

/**@var \common\domain\Film\Film $film */
/**@var \common\domain\Film\FilmSeo $filmSeo */

$this->title = 'Карточка фильма ' . $film->name;

use yii\helpers\Html; ?>

<div class="films-view">

    <div>
        <div class="view-actions">
            <a href="<?= \yii\helpers\Url::to(['films/edit', 'id' => $film->id]) ?>" type="button" class="btn btn-primary">Редактировать</a>
            <?= Html::beginForm(['/films/delete'], 'post', ['class' => 'inline-buttons']) ?>
            <?= Html::hiddenInput('id', $film->id); ?>
            <?= Html::submitButton('Удалить', ['class' => 'btn btn-danger', 'data' => [
                'confirm' => 'Вы действительно хотите удалить фильм?',
                'method' => 'post',
            ],]) ?>
            <?= Html::endForm() ?>
        </div>
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Основное</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <strong><i class="fa fa-file-text-o margin-r-5"></i> Название фильма</strong>

            <p class="text-muted"><?= $film->name ?></p>

            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> Описание</strong>

            <p class="text-muted"><?= $film->description ?></p>

            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> Трейлер</strong>

            <div>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/1-q8C_c-nlM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">СЕО</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <strong><i class="fa fa-file-text-o margin-r-5"></i> Название фильма</strong>

            <p class="text-muted"><?= $filmSeo->title ?></p>

            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> Описание</strong>

            <p class="text-muted"><?= $filmSeo->description ?></p>

            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> Трейлер</strong>

            <p class="text-muted"><?= $filmSeo->keywords ?></p>
        </div>
        <!-- /.box-body -->
    </div>

</div>

