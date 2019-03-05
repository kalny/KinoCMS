<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 12:46
 */

$this->title = 'Редактировать фильм';

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="films-edit">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($formModel, 'year') ?>
    <?= $form->field($formModel, 'director') ?>
    <?= $form->field($formModel, 'producer') ?>
    <?= $form->field($formModel, 'composer') ?>
    <?= $form->field($formModel, 'screenwriter') ?>
    <?= $form->field($formModel, 'operator') ?>
    <?= $form->field($formModel, 'budget') ?>
    <?= $form->field($formModel, 'age') ?>
    <?= $form->field($formModel, 'duration') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>