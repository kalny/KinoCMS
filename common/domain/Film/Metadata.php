<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 05.03.19
 * Time: 12:45
 */

namespace common\domain\Film;


use common\domain\Country\Country;
use common\domain\Genre\Genre;
use yii\db\ActiveRecord;

/**
 * Metadata model
 *
 * @property integer $id
 * @property integer $film_id
 * @property string $year
 * @property string $director
 * @property string $producer
 * @property string $composer
 * @property string $screenwriter
 * @property string $operator
 * @property integer $budget
 * @property integer $age
 * @property float $duration
 */
class Metadata extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%metadata}}';
    }

    public function getCountries()
    {
        return $this->hasMany(Country::class, ['id' => 'country_id'])->viaTable('metadata_country', ['metadata_id' => 'id']);
    }

    public function getGenres()
    {
        return $this->hasMany(Genre::class, ['id' => 'genre_id'])->viaTable('metadata_genres', ['metadata_id' => 'id']);
    }
}