<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 11:23
 */

namespace Common\bootstrap;


use common\domain\City\CityRepositoryInterface;
use common\domain\Country\CountryRepositoryInterface;
use common\domain\Film\FilmRepositoryInterface;
use common\domain\Genre\GenreRepositoryInterface;
use common\domain\Metadata\MetadataRepositoryInterface;
use common\domain\Schedule\ScheduleRepositoryInterface;
use common\repositories\CityRepository;
use common\repositories\CountryRepository;
use common\repositories\FilmRepository;
use common\repositories\GenreRepository;
use common\repositories\MetadataRepository;
use common\repositories\ScheduleRepository;
use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;

class SetUp implements BootstrapInterface
{

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        $container = Yii::$container;

        $container->setSingleton(FilmRepositoryInterface::class, FilmRepository::class);
        $container->setSingleton(MetadataRepositoryInterface::class, MetadataRepository::class);
        $container->setSingleton(CountryRepositoryInterface::class, CountryRepository::class);
        $container->setSingleton(GenreRepositoryInterface::class, GenreRepository::class);
        $container->setSingleton(CityRepositoryInterface::class, CityRepository::class);
        $container->setSingleton(ScheduleRepositoryInterface::class, ScheduleRepository::class);
    }
}