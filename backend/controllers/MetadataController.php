<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 05.03.19
 * Time: 15:08
 */

namespace backend\controllers;


use backend\forms\Metadata\CreateMetadataForm;
use backend\forms\Metadata\EditMetadataForm;
use backend\services\metadata\MetadataService;
use common\domain\Country\Country;
use common\domain\Film\Film;
use common\domain\Genre\Genre;
use common\domain\Metadata\Metadata;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class MetadataController extends Controller
{

    /**
     * @var MetadataService
     */
    private $metadataService;

    public function __construct(string $id, $module, MetadataService $metadataService, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->metadataService = $metadataService;
    }

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
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionEdit($id)
    {
        $metadata = $this->getMetadata($id);

        $form = new EditMetadataForm($metadata);

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {

            $this->metadataService->editMetadata($metadata, $form->getDto());

            return $this->redirect(['metadata/view', 'id' => $metadata->film->id]);
        }

        $genres = ArrayHelper::map(Genre::find()->asArray()->all(), 'id', 'name');
        $country = ArrayHelper::map(Country::find()->asArray()->all(), 'id', 'name');

        return $this->render('edit', [
            'formModel' => $form,
            'genres' => $genres,
            'country' => $country
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionAdd($id)
    {
        $form = new CreateMetadataForm($id);

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {

            $metadata = $this->metadataService->createMetadata($form->getDto());

            return $this->redirect(['metadata/view', 'id' => $metadata->film->id]);
        }

        $genres = ArrayHelper::map(Genre::find()->asArray()->all(), 'id', 'name');
        $country = ArrayHelper::map(Country::find()->asArray()->all(), 'id', 'name');

        return $this->render('add', [
            'formModel' => $form,
            'genres' => $genres,
            'country' => $country
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

    /**
     * @param $id
     * @return Metadata|null
     * @throws NotFoundHttpException
     */
    private function getMetadata($id)
    {
        $metadata = Metadata::findOne($id);

        if (!$metadata) {
            throw new NotFoundHttpException();
        }

        return $metadata;
    }
}