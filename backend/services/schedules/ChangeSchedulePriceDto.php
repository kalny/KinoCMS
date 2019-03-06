<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 11:13
 */

namespace backend\services\schedules;


class ChangeSchedulePriceDto
{
    public $price1;
    public $price2;
    public $price3;

    public function __construct($price1, $price2, $price3)
    {
        $this->price1 = $price1;
        $this->price2 = $price2;
        $this->price3 = $price3;
    }
}