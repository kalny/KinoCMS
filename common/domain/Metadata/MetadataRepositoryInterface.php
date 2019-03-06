<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 05.03.19
 * Time: 15:44
 */

namespace common\domain\Metadata;

/**
 * Interface MetadataRepositoryInterface
 * @package common\domain\Metadata
 *
 * Интерфейс репозитория для метаданных
 */
interface MetadataRepositoryInterface
{
    public function save(Metadata $metadata);
    public function addCountry(Metadata $metadata, array $country);
    public function addGenres(Metadata $metadata, array $genres);
}