<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 10:57
 */

namespace common\domain\Schedule;


interface ScheduleRepositoryInterface
{
    public function save(Schedule $schedule);
}