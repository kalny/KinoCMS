<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 8:07
 */

namespace common\domain\Country;


interface CountryRepositoryInterface
{
    public function save(Country $country);
}