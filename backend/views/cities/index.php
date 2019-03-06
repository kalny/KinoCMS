<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 12:46
 */

$this->title = 'Города';

/**@var \common\domain\City\City[] $cities */

use yii\helpers\Html; ?>
<div class="cities-index">

    <div class="box">

        <div class="box-body">

            <?php if (count($cities) > 0) : ?>
            <table class="table table-bordered">
                <tbody>
                <?php $cnt = 0; foreach ($cities as $city): $cnt++; ?>
                <tr>
                    <td><?= $cnt ?>.</td>
                    <td><?= $city->name ?></td>
                    <td>
                        <a href="<?= \yii\helpers\Url::to(['cities/edit', 'id' => $city->id]) ?>" class="btn btn-primary btn-xs">Редактировать</a>
                        <?= Html::beginForm(['/cities/delete'], 'post', ['class' => 'inline-buttons']) ?>
                        <?= Html::hiddenInput('id', $city->id); ?>
                        <?= Html::submitButton('Удалить', ['class' => 'btn btn-danger btn-xs', 'data' => [
                            'confirm' => 'Вы действительно хотите удалить город?',
                            'method' => 'post',
                        ],]) ?>
                        <?= Html::endForm() ?>
                    </td>
                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
            <?php else: ?>
            <p>Нет ни одного города</p>
            <?php endif ?>
        </div>

    </div>

    <p><a href="<?= \yii\helpers\Url::to(['cities/add']) ?>" class="btn btn-success btn-sm">Добавить город</a></p>
</div>