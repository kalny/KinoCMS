<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 9:06
 */

namespace backend\controllers;


use backend\forms\City\CreateCityForm;
use backend\forms\City\EditCityForm;
use backend\services\cities\CitiesService;
use common\domain\City\City;
use Yii;
use yii\db\IntegrityException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CitiesController extends Controller
{
    /**
     * @var CitiesService
     */
    private $citiesService;

    public function __construct(string $id, $module, CitiesService $citiesService, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->citiesService = $citiesService;
    }

    public function actionIndex()
    {
        $cities = City::find()
            ->orderBy(['name' => SORT_ASC])
            ->all();

        return $this->render('index', [
            'cities' => $cities
        ]);
    }

    public function actionAdd()
    {
        $form = new CreateCityForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {

            $this->citiesService->createCity($form->getDto());

            return $this->redirect(['cities/index']);
        }

        return $this->render('add', [
            'formModel' => $form
        ]);
    }

    public function actionEdit($id)
    {
        $city = $this->getCity($id);

        $form = new EditCityForm($city);

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {

            $this->citiesService->editCity($city, $form->getDto());

            return $this->redirect(['cities/index']);
        }

        return $this->render('edit', [
            'formModel' => $form
        ]);
    }

    public function actionDelete()
    {
        $id = Yii::$app->request->post('id');

        $city = $this->getCity($id);

        try {
            $city->delete();
        } catch (IntegrityException $e) {
            Yii::$app->session->setFlash('warning', "В этом городе есть сеансы, нельзя его удалить.");
        }

        return $this->redirect(['cities/index']);
    }

    private function getCity($id)
    {
        $city = City::findOne($id);

        if (!$city) {
            throw new NotFoundHttpException();
        }

        return $city;
    }
}