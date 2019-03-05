<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 05.03.19
 * Time: 15:48
 */

namespace common\repositories;

use common\domain\Metadata\Metadata;
use common\domain\Metadata\MetadataRepositoryInterface;

/**
 * Class MetadataRepository
 * @package common\repositories
 *
 * Репозиторий для метаданных
 */
class MetadataRepository implements MetadataRepositoryInterface
{

    public function save(Metadata $metadata)
    {
        if (!$metadata->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }
}