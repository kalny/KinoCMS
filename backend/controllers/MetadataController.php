<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 05.03.19
 * Time: 15:08
 */

namespace backend\controllers;


use common\domain\Film\Film;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class MetadataController extends Controller
{
    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $film = $this->getFilm($id);

        $filmMetadata = $film->getMetadata()->one();

        return $this->render('view', [
            'film' => $film,
            'filmMetadata' => $filmMetadata
        ]);
    }

    /**
     * @param $id
     * @return Film|null
     * @throws NotFoundHttpException
     */
    private function getFilm($id)
    {
        $film = Film::findOne($id);

        if (!$film) {
            throw new NotFoundHttpException();
        }

        return $film;
    }
}