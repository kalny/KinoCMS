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

use yii\helpers\Html;
use zxbodya\yii2\galleryManager\GalleryManager; ?>

<div class="films-view">

    <div class="view-actions">
        <a href="<?= \yii\helpers\Url::to(['films/edit', 'id' => $film->id]) ?>" type="button" class="btn btn-primary">Редактировать</a>
        <a href="<?= \yii\helpers\Url::to(['metadata/view', 'id' => $film->id]) ?>" type="button" class="btn btn-success">Метаданные</a>
        <?= Html::beginForm(['/films/delete'], 'post', ['class' => 'inline-buttons']) ?>
        <?= Html::hiddenInput('id', $film->id); ?>
        <?= Html::submitButton('Удалить', ['class' => 'btn btn-danger', 'data' => [
            'confirm' => 'Вы действительно хотите удалить фильм?',
            'method' => 'post',
        ],]) ?>
        <?= Html::endForm() ?>
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
                <iframe width="560" height="315" src="<?= $film->trailer_url ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Постеры и кадры</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?= GalleryManager::widget(
                [
                    'model' => $film,
                    'behaviorName' => 'galleryBehavior',
                    'apiRoute' => 'films/galleryApi'
                ]
            ); ?>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Основной постер</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php if ($film->main_poster_id === null): ?>
            <p>Основной постер еще не установлен. Перейдите на
                <a href="<?= \yii\helpers\Url::to(['films/edit', 'id' => $film->id]) ?>">страницу редактирования</a>
                фильма, чтобы установить его.</p>
            <?php else: ?>
            <p><img src="/posters/<?= $film->id ?>/<?= $film->main_poster_id ?>/small.jpg" alt=""></p>
            <p>Основной постер можно сменить на
                <a href="<?= \yii\helpers\Url::to(['films/edit', 'id' => $film->id]) ?>">странице редактирования</a>
            фильма. Можно выбрать только постер, у которого заполнено название.</p>
            <?php endif ?>
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

