<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 11:17
 */

namespace backend\services\schedules;


use common\domain\Schedule\Schedule;
use common\domain\Schedule\ScheduleRepositoryInterface;

class SchedulesService
{
    /**
     * @var ScheduleRepositoryInterface
     */
    private $repository;

    public function __construct(ScheduleRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function createSchedule($filmId, CreateScheduleDto $createScheduleDto)
    {
        $dateStr = strtotime($createScheduleDto->date);

        if (!$dateStr) {
            throw new \DomainException("Incorrect date string format");
        }

        $date = (new \DateTimeImmutable())->setTimestamp($dateStr);

        $schedule = Schedule::create(
            $filmId,
            $createScheduleDto->cityId,
            $createScheduleDto->type,
            $date,
            $createScheduleDto->hall,
            $createScheduleDto->price1,
            $createScheduleDto->price2,
            $createScheduleDto->price3
        );

        $this->repository->save($schedule);

        return $schedule;
    }

    public function changeCost(Schedule $schedule, ChangeSchedulePriceDto $changeSchedulePriceDto)
    {
        $schedule->changeCost(
            $changeSchedulePriceDto->price1,
            $changeSchedulePriceDto->price2,
            $changeSchedulePriceDto->price3
        );

        $this->repository->save($schedule);
    }

    public function close(Schedule $schedule)
    {
        $schedule->close();

        $this->repository->save($schedule);
    }
}