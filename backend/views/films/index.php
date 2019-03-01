<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 12:46
 */

$this->title = 'Фильмы';

?>
<div class="films-index">

    <div class="box">

        <div class="box-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>1.</td>
                    <td>Приключение животных</td>
                    <td>
                        <a href="<?= \yii\helpers\Url::to(['films/edit', 'id' => 123]) ?>" class="btn btn-default btn-xs">Редактировать</a>
                    </td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Приключение животных</td>
                    <td>
                        <a href="<?= \yii\helpers\Url::to(['films/edit', 'id' => 124]) ?>" class="btn btn-default btn-xs">Редактировать</a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>

    </div>

    <p><a href="<?= \yii\helpers\Url::to(['films/add']) ?>" class="btn btn-success btn-sm">Добавить фильм</a></p>
</div>