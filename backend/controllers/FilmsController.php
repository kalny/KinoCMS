<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 12:44
 */

namespace backend\controllers;

use backend\forms\CreateFilmForm;
use backend\forms\EditFilmForm;
use backend\services\films\FilmsService;
use common\domain\Film\Film;
use common\domain\Film\FilmSeo;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Class FilmsController
 * @package backend\controllers
 */
class FilmsController extends Controller
{
    /**
     * @var FilmsService
     */
    private $filmsService;

    /**
     * FilmsController constructor.
     * @param string $id
     * @param $module
     * @param FilmsService $filmsService
     * @param array $config
     */
    public function __construct(string $id, $module, FilmsService $filmsService, array $config = [])
    {
        parent::__construct($id, $module, $config);

        $this->filmsService = $filmsService;
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $films = Film::find()->all();

        return $this->render('index', [
            'films' => $films
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $film = $this->getFilm($id);

        $filmSeo = $film->getSeo()->one();

        return $this->render('view', [
            'film' => $film,
            'filmSeo' => $filmSeo
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionEdit($id)
    {
        /**@var Film $film */
        $film = $this->getFilm($id);

        /**@var FilmSeo $filmSeo */
        $filmSeo = $film->getSeo()->one();

        $form = new EditFilmForm($film);

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {

            $this->filmsService->editFilm($film, $filmSeo, $form->getDto());

            return $this->redirect(['films/view', 'id' => $film->id]);
        }

        return $this->render('edit', [
            'formModel' => $form
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $form = new CreateFilmForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {

            $film = $this->filmsService->createFilm($form->getDto());

            return $this->redirect(['films/view', 'id' => $film->id]);
        }

        return $this->render('add', [
            'formModel' => $form
        ]);
    }

    /**
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->post('id');

        $film = $this->getFilm($id);

        $film->delete();

        return $this->redirect(['films/index']);
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