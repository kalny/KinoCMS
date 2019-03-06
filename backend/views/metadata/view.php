<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 04.03.19
 * Time: 15:21
 */

/**@var \common\domain\Film\Film $film */
/**@var \common\domain\Metadata\Metadata $filmMetadata */

$this->title = 'Метаданные фильма ' . $film->name;

?>

<div class="films-view">

    <div class="view-actions">
        <a href="<?= \yii\helpers\Url::to(['films/view', 'id' => $film->id]) ?>" type="button" class="btn btn-primary">
            Вернуться к фильму
        </a>
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Основное</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php if (count($filmMetadata) > 0) : ?>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Жанр</td>
                            <td>
                                <?php foreach ($filmMetadata->genres as $genre): ?>
                                    <?= $genre->name; ?>&nbsp;
                                <?php endforeach; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Страна</td>
                            <td>
                                <?php foreach ($filmMetadata->countries as $country): ?>
                                <?= $country->name; ?>&nbsp;
                                <?php endforeach; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Год</td>
                            <td><?= $filmMetadata->year ?></td>
                        </tr>
                        <tr>
                            <td>Режиссёр</td>
                            <td><?= $filmMetadata->director ?></td>
                        </tr>
                        <tr>
                            <td>Продёсер</td>
                            <td><?= $filmMetadata->producer ?></td>
                        </tr>
                        <tr>
                            <td>Композитор</td>
                            <td><?= $filmMetadata->composer ?></td>
                        </tr>
                        <tr>
                            <td>Автор сценария</td>
                            <td><?= $filmMetadata->screenwriter ?></td>
                        </tr>
                        <tr>
                            <td>Оператор</td>
                            <td><?= $filmMetadata->operator ?></td>
                        </tr>
                        <tr>
                            <td>Бюджет</td>
                            <td><?= $filmMetadata->budget ?> млн.</td>
                        </tr>
                        <tr>
                            <td>Возраст</td>
                            <td>Зрителям, достигшим <?= $filmMetadata->age ?> лет</td>
                        </tr>
                        <tr>
                            <td>Продолжительность</td>
                            <td><?= $filmMetadata->duration ?> ч.</td>
                        </tr>
                    </tbody>
                </table><br>
                <p><a href="<?= \yii\helpers\Url::to(['metadata/edit', 'id' => $filmMetadata->id]) ?>" type="button" class="btn btn-success">
                    Редактировать
                </a></p>
            <?php else: ?>
                <p>Метаданные отсутствуют</p><br>
                <p><a href="<?= \yii\helpers\Url::to(['metadata/add', 'id' => $film->id]) ?>" type="button" class="btn btn-success">
                        Добавить
                    </a></p>
            <?php endif ?>
        </div>
        <!-- /.box-body -->
    </div>

</div>

