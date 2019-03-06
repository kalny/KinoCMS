<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 9:07
 */

namespace backend\services\cities;


use common\domain\City\City;
use common\domain\City\CityRepositoryInterface;

class CitiesService
{
    /**
     * @var CityRepositoryInterface
     */
    private $repository;

    public function __construct(CityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function createCity(CityDto $cityDto)
    {
        $city = City::create(
            $cityDto->name
        );

        $this->repository->save($city);

        return $city;
    }

    public function editCity(City $city, CityDto $cityDto)
    {
        $city->edit(
            $cityDto->name
        );

        $this->repository->save($city);
    }
}