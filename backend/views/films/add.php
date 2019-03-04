<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 12:46
 */

$this->title = 'Добавить фильм';

use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>

<div class="films-add">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($formModel, 'name') ?>
    <?= $form->field($formModel, 'description')->textarea(['rows' => '6']) ?>
    <?= $form->field($formModel, 'seoTitle') ?>
    <?= $form->field($formModel, 'seoDescription')->textarea(['rows' => '6']) ?>
    <?= $form->field($formModel, 'seoKeywords')->textarea(['rows' => '6']) ?>
    <?= $form->field($formModel, 'trailerUrl') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
