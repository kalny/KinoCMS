<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 12:46
 */

$this->title = 'Новости';

?>
<div class="news-index">

    <div class="box">

        <div class="box-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>2.</td>
                    <td>Новость номер 2</td>
                    <td>
                        <a href="<?= \yii\helpers\Url::to(['news/edit', 'id' => 22]) ?>" class="btn btn-default btn-xs">Редактировать</a>
                    </td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>Новость номер 1</td>
                    <td>
                        <a href="<?= \yii\helpers\Url::to(['news/edit', 'id' => 23]) ?>" class="btn btn-default btn-xs">Редактировать</a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>

    </div>

    <p><a href="<?= \yii\helpers\Url::to(['news/add']) ?>" class="btn btn-success btn-sm">Добавить новость</a></p>
</div>