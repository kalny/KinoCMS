<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 9:19
 */

namespace backend\services\cities;


class CityDto
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}