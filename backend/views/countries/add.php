<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 8:11
 */

$this->title = 'Добавить страну';

use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>

<div class="countries-add">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($formModel, 'name') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
