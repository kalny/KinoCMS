<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 12:46
 */

$this->title = 'Жанры';

/**@var \common\domain\Genre\Genre[] $genres */

use yii\helpers\Html; ?>
<div class="genres-index">

    <div class="box">

        <div class="box-body">

            <?php if (count($genres) > 0) : ?>
            <table class="table table-bordered">
                <tbody>
                <?php $cnt = 0; foreach ($genres as $genre): $cnt++; ?>
                <tr>
                    <td><?= $cnt ?>.</td>
                    <td><?= $genre->name ?></td>
                    <td>
                        <a href="<?= \yii\helpers\Url::to(['genres/edit', 'id' => $genre->id]) ?>" class="btn btn-primary btn-xs">Редактировать</a>
                        <?= Html::beginForm(['/genres/delete'], 'post', ['class' => 'inline-buttons']) ?>
                        <?= Html::hiddenInput('id', $genre->id); ?>
                        <?= Html::submitButton('Удалить', ['class' => 'btn btn-danger btn-xs', 'data' => [
                            'confirm' => 'Вы действительно хотите удалить жанр?',
                            'method' => 'post',
                        ],]) ?>
                        <?= Html::endForm() ?>
                    </td>
                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
            <?php else: ?>
            <p>Нет ни одного жанра</p>
            <?php endif ?>
        </div>

    </div>

    <p><a href="<?= \yii\helpers\Url::to(['genres/add']) ?>" class="btn btn-success btn-sm">Добавить жанр</a></p>
</div>