<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 8:30
 */

$this->title = 'Сменить цены';

use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>

<div class="change-cost">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($formModel, 'price1') ?>
    <?= $form->field($formModel, 'price2') ?>
    <?= $form->field($formModel, 'price3') ?>

    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
