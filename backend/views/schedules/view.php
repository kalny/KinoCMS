<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 04.03.19
 * Time: 15:21
 */

/**@var \common\domain\Schedule\Schedule $schedule */

$this->title = 'Запись сеанса фильма';

use yii\helpers\Html; ?>

<div class="schedule-view">

    <div class="view-actions">
        <a href="<?= \yii\helpers\Url::to(['schedules/change-cost', 'id' => $schedule->id]) ?>" type="button" class="btn btn-primary">
            Сменить цены
        </a>

        <?= Html::beginForm(['/schedules/close'], 'post', ['class' => 'inline-buttons']) ?>
        <?= Html::hiddenInput('id', $schedule->id); ?>
        <?= Html::submitButton('Закрыть', ['class' => 'btn btn-warning', 'data' => [
            'confirm' => 'Вы действительно хотите закрыть запись?',
            'method' => 'post',
        ],]) ?>
        <?= Html::endForm() ?>

        <?= Html::beginForm(['/schedules/delete'], 'post', ['class' => 'inline-buttons']) ?>
        <?= Html::hiddenInput('id', $schedule->id); ?>
        <?= Html::submitButton('Удалить', ['class' => 'btn btn-danger', 'data' => [
            'confirm' => 'Вы действительно хотите удалить запись?',
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
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>Фильм</td>
                    <td><?= $schedule->film->name ?></td>
                </tr>
                <tr>
                    <td>Город</td>
                    <td><?= $schedule->city->name ?></td>
                </tr>
                <tr>
                    <td>Дата</td>
                    <td><?= (new DateTimeImmutable())->setTimestamp($schedule->date)->format('d-m-Y') ?></td>
                </tr>
                <tr>
                    <td>Кинозал</td>
                    <td><?= $schedule->hall ?></td>
                </tr>
                <tr>
                    <td>Тип</td>
                    <td><?= $schedule->getTypeString() ?></td>
                </tr>
                <tr>
                    <td>Статус</td>
                    <td><?= $schedule->getStatusString() ?></td>
                </tr>
                <tr>
                    <td>Цена 1</td>
                    <td><?= $schedule->price_1 ?></td>
                </tr>
                <tr>
                    <td>Цена 2</td>
                    <td><?= $schedule->price_2 ?></td>
                </tr>
                <tr>
                    <td>Цена 3</td>
                    <td><?= $schedule->price_3 ?></td>
                </tr>

                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

</div>