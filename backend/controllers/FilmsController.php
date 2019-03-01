<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 12:44
 */

namespace backend\controllers;


use yii\web\Controller;

class FilmsController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionEdit($id)
    {
        return $this->render('edit');
    }

    public function actionAdd()
    {
        return $this->render('add');
    }

}