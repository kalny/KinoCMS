<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 8:03
 */

namespace backend\services\countries;


class CountryDto
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}