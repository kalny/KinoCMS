<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 12:46
 */

$this->title = 'Расписание сеансов';

/**@var \common\domain\Schedule\Schedule[] $schedules */

use yii\helpers\Html; ?>
<div class="schedules-index">

    <div class="box">

        <div class="box-body">

            <?php if (count($schedules) > 0) : ?>
            <table class="table table-bordered">
                <tbody>
                <?php $cnt = 0; foreach ($schedules as $schedule): $cnt++; ?>
                <tr>
                    <td><?= $cnt ?>.</td>
                    <td><?= $schedule->film->name ?></td>
                    <td><?= $schedule->city->name ?></td>
                    <td><?= (new \DateTimeImmutable())->setTimestamp($schedule->date)->format('d-m-Y') ?></td>
                    <td><?= $schedule->getStatusString() ?></td>
                    <td>
                        <a href="<?= \yii\helpers\Url::to(['schedules/view', 'id' => $schedule->id]) ?>" class="btn btn-primary btn-xs">Просмотр</a>

                        <?= Html::beginForm(['/schedules/delete'], 'post', ['class' => 'inline-buttons']) ?>
                        <?= Html::hiddenInput('id', $schedule->id); ?>
                        <?= Html::submitButton('Удалить', ['class' => 'btn btn-danger btn-xs', 'data' => [
                            'confirm' => 'Вы действительно хотите удалить запись?',
                            'method' => 'post',
                        ],]) ?>
                        <?= Html::endForm() ?>
                    </td>
                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
            <?php else: ?>
            <p>Нет ни одной записи</p>
            <?php endif ?>
        </div>

    </div>
</div>