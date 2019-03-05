<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 11:23
 */

namespace Common\bootstrap;


use common\domain\Film\FilmRepositoryInterface;
use common\domain\Metadata\MetadataRepositoryInterface;
use common\repositories\FilmRepository;
use common\repositories\MetadataRepository;
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
    }
}