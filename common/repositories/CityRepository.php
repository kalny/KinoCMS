<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 9:15
 */

namespace common\repositories;


use common\domain\City\City;
use common\domain\City\CityRepositoryInterface;

class CityRepository implements CityRepositoryInterface
{

    public function save(City $city)
    {
        if (!$city->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }
}