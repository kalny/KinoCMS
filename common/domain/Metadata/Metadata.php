<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 05.03.19
 * Time: 12:45
 */

namespace common\domain\Metadata;


use common\domain\Country\Country;
use common\domain\Film\Film;
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

    public function edit($year, $director, $producer, $composer, $screenwriter, $operator, $budget, $age, $duration)
    {
        $this->year = $year;
        $this->director = $director;
        $this->producer = $producer;
        $this->composer = $composer;
        $this->screenwriter = $screenwriter;
        $this->operator = $operator;
        $this->budget = $budget;
        $this->age = $age;
        $this->duration = $duration;
    }

    public static function create($year, $director, $producer, $composer, $screenwriter, $operator, $budget, $age, $duration, $filmId)
    {
        $metadata = new self();

        $metadata->year = $year;
        $metadata->director = $director;
        $metadata->producer = $producer;
        $metadata->composer = $composer;
        $metadata->screenwriter = $screenwriter;
        $metadata->operator = $operator;
        $metadata->budget = $budget;
        $metadata->age = $age;
        $metadata->duration = $duration;
        $metadata->film_id = $filmId;

        return $metadata;
    }

    public function getCountries()
    {
        return $this->hasMany(Country::class, ['id' => 'country_id'])->viaTable('metadata_country', ['metadata_id' => 'id']);
    }

    public function getGenres()
    {
        return $this->hasMany(Genre::class, ['id' => 'genre_id'])->viaTable('metadata_genres', ['metadata_id' => 'id']);
    }

    public function getFilm()
    {
        return $this->hasOne(Film::class, ['id' => 'film_id']);
    }
}