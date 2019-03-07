<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 12:09
 */

namespace frontend\controllers;


use frontend\query\FilmQuery;
use yii\web\Controller;

class CinemaController extends Controller
{

    /**
     * @return string
     */
    public function actionAffiche()
    {
        $films = (new FilmQuery())->getFilms();

        return $this->render('affiche', [
            'films' => $films
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionFilm($id)
    {
        $film = (new FilmQuery())->getFilm($id);

        return $this->render('film', [
            'film' => $film
        ]);
    }
}