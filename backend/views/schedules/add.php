<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 8:11
 */

$this->title = 'Добавить запись в расписание';

use dosamigos\datetimepicker\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**@var \common\domain\City\City[] $cities */
/**@var array $scheduleTypes */
?>

<div class="schedules-add">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($formModel, 'cityId')->dropDownList(\yii\helpers\ArrayHelper::map($cities, 'id', 'name')) ?>
    <?= $form->field($formModel, 'type')->dropDownList($scheduleTypes) ?>
    <?= $form->field($formModel, 'date')->widget(
        DateTimePicker::class, [
        'language' => 'ru',
        //'size' => 'ms',
        'template' => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'inline' => false,
        'clientOptions' => [
            //'startView' => 1,
            //'minView' => 0,
            //'maxView' => 1,
            'autoclose' => true,
            //'linkFormat' => 'HH:ii P', // if inline = true
            'format' => 'dd-mm-yyyy HH:ii P', // if inline = false
            //'todayBtn' => true
        ]
    ]); ?>
    <?= $form->field($formModel, 'hall') ?>
    <?= $form->field($formModel, 'price1') ?>
    <?= $form->field($formModel, 'price2') ?>
    <?= $form->field($formModel, 'price3') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
