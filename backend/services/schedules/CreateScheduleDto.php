<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 11:11
 */

namespace backend\services\schedules;


class CreateScheduleDto
{
    public $cityId;
    public $type;
    public $date;
    public $hall;

    public $price1;
    public $price2;
    public $price3;

    public function __construct($cityId, $type, $date, $hall, $price1, $price2, $price3)
    {

        $this->cityId = $cityId;
        $this->type = $type;
        $this->date = $date;
        $this->hall = $hall;
        $this->price1 = $price1;
        $this->price2 = $price2;
        $this->price3 = $price3;
    }
}