<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 12:46
 */

$this->title = 'Страны';

/**@var \common\domain\Country\Country[] $countries */

use yii\helpers\Html; ?>
<div class="countries-index">

    <div class="box">

        <div class="box-body">

            <?php if (count($countries) > 0) : ?>
            <table class="table table-bordered">
                <tbody>
                <?php $cnt = 0; foreach ($countries as $country): $cnt++; ?>
                <tr>
                    <td><?= $cnt ?>.</td>
                    <td><?= $country->name ?></td>
                    <td>
                        <a href="<?= \yii\helpers\Url::to(['countries/edit', 'id' => $country->id]) ?>" class="btn btn-primary btn-xs">Редактировать</a>
                        <?= Html::beginForm(['/countries/delete'], 'post', ['class' => 'inline-buttons']) ?>
                        <?= Html::hiddenInput('id', $country->id); ?>
                        <?= Html::submitButton('Удалить', ['class' => 'btn btn-danger btn-xs', 'data' => [
                            'confirm' => 'Вы действительно хотите удалить страну?',
                            'method' => 'post',
                        ],]) ?>
                        <?= Html::endForm() ?>
                    </td>
                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
            <?php else: ?>
            <p>Нет ни одной страны фильма</p>
            <?php endif ?>
        </div>

    </div>

    <p><a href="<?= \yii\helpers\Url::to(['countries/add']) ?>" class="btn btn-success btn-sm">Добавить страну</a></p>
</div>