<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 05.03.19
 * Time: 15:36
 */

namespace backend\services\metadata;

use common\domain\Metadata\Metadata;
use common\domain\Metadata\MetadataRepositoryInterface;

/**
 * Class MetadataService
 * @package backend\services\metadata
 *
 *
 * Сервис для управления метаданными
 */
class MetadataService
{
    /**
     * @var MetadataRepositoryInterface
     */
    private $repository;

    /**
     * FilmsService constructor.
     * @param MetadataRepositoryInterface $repository
     *
     * Конструктор, внедряем зависимость от репозитория
     *
     */
    public function __construct(MetadataRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     *
     * Изменить метаданные
     *
     * @param Metadata $metadata
     * @param MetadataDto $metadataDto
     */
    public function editMetadata(Metadata $metadata, MetadataDto $metadataDto)
    {
        $metadata->edit(
            $metadataDto->year,
            $metadataDto->director,
            $metadataDto->producer,
            $metadataDto->composer,
            $metadataDto->screenwriter,
            $metadataDto->operator,
            $metadataDto->budget,
            $metadataDto->age,
            $metadataDto->duration
        );

        $this->repository->save($metadata);

        if (is_array($metadataDto->genres)) {
            $this->repository->addGenres($metadata, $metadataDto->genres);
        }

        if (is_array($metadataDto->country)) {
            $this->repository->addCountry($metadata, $metadataDto->country);
        }

    }

    /**
     *
     * Создать метаданные и сохранить их в базе данных
     *
     * @param MetadataDto $metadataDto
     * @return Metadata
     */
    public function createMetadata(MetadataDto $metadataDto)
    {
        $metadata = Metadata::create(
            $metadataDto->year,
            $metadataDto->director,
            $metadataDto->producer,
            $metadataDto->composer,
            $metadataDto->screenwriter,
            $metadataDto->operator,
            $metadataDto->budget,
            $metadataDto->age,
            $metadataDto->duration,
            $metadataDto->filmId
        );

        $this->repository->save($metadata);

        if (is_array($metadataDto->genres)) {
            $this->repository->addGenres($metadata, $metadataDto->genres);
        }

        if (is_array($metadataDto->country)) {
            $this->repository->addCountry($metadata, $metadataDto->country);
        }

        return $metadata;
    }
}