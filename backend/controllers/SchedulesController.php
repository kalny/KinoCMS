<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 11:30
 */

namespace backend\controllers;


use backend\forms\Schedules\ChangeSchedulePriceForm;
use backend\forms\Schedules\CreateScheduleForm;
use backend\services\schedules\SchedulesService;
use common\domain\City\City;
use common\domain\Schedule\Schedule;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SchedulesController extends Controller
{
    /**
     * @var SchedulesService
     */
    private $schedulesService;

    public function __construct(string $id, $module, SchedulesService $schedulesService, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->schedulesService = $schedulesService;
    }

    public function actionIndex()
    {
        $schedules = Schedule::find()
            ->orderBy(['date' => SORT_DESC])
            ->all();

        return $this->render('index', [
            'schedules' => $schedules
        ]);
    }

    public function actionAdd($id)
    {
        $form = new CreateScheduleForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {

            $schedule = $this->schedulesService->createSchedule($id, $form->getDto());

            return $this->redirect(['schedules/view', 'id' => $schedule->id]);
        }

        $cities = City::find()
            ->orderBy(['name' => SORT_ASC])
            ->all();

        return $this->render('add', [
            'formModel' => $form,
            'cities' => $cities,
            'scheduleTypes' => Schedule::getTypesArray()
        ]);
    }

    public function actionChangeCost($id)
    {
        $schedule = $this->getSchedule($id);

        $form = new ChangeSchedulePriceForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {

            $this->schedulesService->changeCost($schedule, $form->getDto());

            return $this->redirect(['schedules/view', 'id' => $schedule->id]);
        }

        return $this->render('change-cost', [
            'formModel' => $form
        ]);
    }

    public function actionView($id)
    {
        $schedule = $this->getSchedule($id);

        return $this->render('view', [
            'schedule' => $schedule
        ]);
    }

    public function actionDelete()
    {
        $id = Yii::$app->request->post('id');

        $schedule = $this->getSchedule($id);

        $schedule->delete();

        return $this->redirect(['schedules/index']);
    }

    public function actionClose()
    {
        $id = Yii::$app->request->post('id');

        $schedule = $this->getSchedule($id);

        $this->schedulesService->close($schedule);

        return $this->redirect(['schedules/view', 'id' => $schedule->id]);
    }

    private function getSchedule($id)
    {
        $schedule = Schedule::findOne($id);

        if (!$schedule) {
            throw new NotFoundHttpException();
        }

        return $schedule;
    }
}