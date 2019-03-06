<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 8:09
 */

namespace common\repositories;


use common\domain\Country\Country;
use common\domain\Country\CountryRepositoryInterface;

class CountryRepository implements CountryRepositoryInterface
{

    public function save(Country $country)
    {
        if (!$country->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }
}