<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 9:15
 */

namespace common\domain\City;


interface CityRepositoryInterface
{
    public function save(City $city);
}