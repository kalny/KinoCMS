<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 8:05
 */

namespace backend\services\countries;


use common\domain\Country\Country;
use common\domain\Country\CountryRepositoryInterface;

class CountriesService
{
    /**
     * @var CountryRepositoryInterface
     */
    private $repository;

    public function __construct(CountryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function createCountry(CountryDto $countryDto)
    {
        $country = Country::create(
            $countryDto->name
        );

        $this->repository->save($country);

        return $country;
    }

    public function editCountry(Country $country, CountryDto $countryDto)
    {
        $country->edit(
            $countryDto->name
        );

        $this->repository->save($country);
    }
}