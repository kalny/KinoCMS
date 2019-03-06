<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 8:38
 */

namespace backend\controllers;


use backend\forms\Genre\CreateGenreForm;
use backend\forms\Genre\EditGenreForm;
use backend\services\genres\GenresService;
use common\domain\Genre\Genre;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class GenresController extends Controller
{
    /**
     * @var GenresService
     */
    private $genresService;

    public function __construct(string $id, $module, GenresService $genresService, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->genresService = $genresService;
    }

    public function actionIndex()
    {
        $genres = Genre::find()
            ->orderBy(['name' => SORT_ASC])
            ->all();

        return $this->render('index', [
            'genres' => $genres
        ]);
    }

    public function actionAdd()
    {
        $form = new CreateGenreForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {

            $this->genresService->createGenre($form->getDto());

            return $this->redirect(['genres/index']);
        }

        return $this->render('add', [
            'formModel' => $form
        ]);
    }

    public function actionEdit($id)
    {
        $genre = $this->getGenre($id);

        $form = new EditGenreForm($genre);

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {

            $this->genresService->editGenre($genre, $form->getDto());

            return $this->redirect(['genres/index']);
        }

        return $this->render('edit', [
            'formModel' => $form
        ]);
    }

    public function actionDelete()
    {
        $id = Yii::$app->request->post('id');

        $genre = $this->getGenre($id);

        $genre->delete();

        return $this->redirect(['genres/index']);
    }

    private function getGenre($id)
    {
        $genre = Genre::findOne($id);

        if (!$genre) {
            throw new NotFoundHttpException();
        }

        return $genre;
    }
}