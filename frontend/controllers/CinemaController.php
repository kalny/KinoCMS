<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 12:09
 */

namespace frontend\controllers;


use yii\web\Controller;

class CinemaController extends Controller
{

    /**
     * @return string
     */
    public function actionAffiche()
    {
        return $this->render('affiche');
    }

    /**
     * @param $id
     * @return string
     */
    public function actionFilm($id)
    {
        return $this->render('film');
    }
}