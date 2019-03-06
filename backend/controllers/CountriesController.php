<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 7:52
 */

namespace backend\controllers;


use backend\forms\Country\CreateCountryForm;
use backend\forms\Country\EditCountryForm;
use backend\services\countries\CountriesService;
use common\domain\Country\Country;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CountriesController extends Controller
{

    /**
     * @var CountriesService
     */
    private $countriesService;

    public function __construct(string $id, $module, CountriesService $countriesService, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->countriesService = $countriesService;
    }

    public function actionIndex()
    {
        $countries = Country::find()
            ->orderBy(['name' => SORT_ASC])
            ->all();

        return $this->render('index', [
            'countries' => $countries
        ]);
    }

    public function actionAdd()
    {
        $form = new CreateCountryForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {

            $this->countriesService->createCountry($form->getDto());

            return $this->redirect(['countries/index']);
        }

        return $this->render('add', [
            'formModel' => $form
        ]);
    }

    public function actionEdit($id)
    {
        $country = $this->getCountry($id);

        $form = new EditCountryForm($country);

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {

            $this->countriesService->editCountry($country, $form->getDto());

            return $this->redirect(['countries/index']);
        }

        return $this->render('edit', [
            'formModel' => $form
        ]);
    }

    public function actionDelete()
    {
        $id = Yii::$app->request->post('id');

        $country = $this->getCountry($id);

        $country->delete();

        return $this->redirect(['countries/index']);
    }

    private function getCountry($id)
    {
        $country = Country::findOne($id);

        if (!$country) {
            throw new NotFoundHttpException();
        }

        return $country;
    }
}