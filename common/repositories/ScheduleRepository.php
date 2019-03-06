<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 10:58
 */

namespace common\repositories;


use common\domain\Schedule\Schedule;
use common\domain\Schedule\ScheduleRepositoryInterface;

class ScheduleRepository implements ScheduleRepositoryInterface
{

    public function save(Schedule $schedule)
    {
        if (!$schedule->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }
}