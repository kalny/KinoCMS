<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 12:46
 */

$this->title = 'Фильмы';

/**@var \common\domain\Film\Film[] $films */

use yii\helpers\Html; ?>
<div class="films-index">

    <div class="box">

        <div class="box-body">

            <?php if (count($films) > 0) : ?>
            <table class="table table-bordered">
                <tbody>
                <?php $cnt = 0; foreach ($films as $film): $cnt++; ?>
                <tr>
                    <td><?= $cnt ?>.</td>
                    <td><a href="<?= \yii\helpers\Url::to(['films/view', 'id' => $film->id]) ?>"><?= $film->name ?></a></td>
                    <td>
                        <a href="<?= \yii\helpers\Url::to(['films/edit', 'id' => $film->id]) ?>" class="btn btn-primary btn-xs">Редактировать</a>
                        <a href="<?= \yii\helpers\Url::to(['films/metadata', 'id' => $film->id]) ?>" class="btn btn-success btn-xs">Метаданные</a>
                        <?= Html::beginForm(['/films/delete'], 'post', ['class' => 'inline-buttons']) ?>
                        <?= Html::hiddenInput('id', $film->id); ?>
                        <?= Html::submitButton('Удалить', ['class' => 'btn btn-danger btn-xs', 'data' => [
                            'confirm' => 'Вы действительно хотите удалить фильм?',
                            'method' => 'post',
                        ],]) ?>
                        <?= Html::endForm() ?>
                    </td>
                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
            <?php else: ?>
            <p>Нет ни одного фильма</p>
            <?php endif ?>
        </div>

    </div>

    <p><a href="<?= \yii\helpers\Url::to(['films/add']) ?>" class="btn btn-success btn-sm">Добавить фильм</a></p>
</div>