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
use yii\db\Query;

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

    public function addCountry(Metadata $metadata, array $country)
    {
        $metadataId = $metadata->id;

        //Удаляем все страны
        \Yii::$app
            ->db
            ->createCommand()
            ->delete('{{%metadata_country}}', ['metadata_id' => $metadataId])
            ->execute();

        //записываем заново
        foreach ($country as $id) {
            \Yii::$app
                ->db
                ->createCommand()
                ->insert('{{%metadata_country}}', ['metadata_id' => $metadataId, 'country_id' => $id])
                ->execute();
        }
    }

    public function addGenres(Metadata $metadata, array $genres)
    {
        $metadataId = $metadata->id;

        //Удаляем все жанры
        \Yii::$app
            ->db
            ->createCommand()
            ->delete('{{%metadata_genres}}', ['metadata_id' => $metadataId])
            ->execute();

        //записываем заново
        foreach ($genres as $id) {
            \Yii::$app
                ->db
                ->createCommand()
                ->insert('{{%metadata_genres}}', ['metadata_id' => $metadataId, 'genre_id' => $id])
                ->execute();
        }
    }
}