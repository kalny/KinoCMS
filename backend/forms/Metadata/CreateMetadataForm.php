<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 05.03.19
 * Time: 16:09
 */

namespace backend\forms\Metadata;

use backend\services\metadata\MetadataDto;
use yii\base\Model;

/**
 * Class CreateMetadataForm
 * @package backend\forms
 *
 *
 * Форма создания метаданных
 */
class CreateMetadataForm extends Model
{
    public $filmId;
    public $year;
    public $director;
    public $producer;
    public $composer;
    public $screenwriter;
    public $operator;
    public $budget;
    public $age;
    public $duration;

    public $genres;
    public $country;

    public function rules()
    {
        return [
            [['budget', 'age'], 'integer'],
            ['duration', 'double'],
            [['year', 'director', 'producer', 'composer', 'screenwriter', 'operator', 'budget', 'age', 'duration'], 'required'],
            [['director', 'producer', 'composer', 'screenwriter', 'operator'], 'string'],
            [['year'], 'string','length' => 4],
            [['country', 'genres'], 'safe']
        ];
    }

    public function __construct($filmId, array $config = [])
    {
        parent::__construct($config);

        $this->filmId = $filmId;

    }

    public function attributeLabels()
    {
        return [
            'year' => 'Год',
            'director' => 'Режиссёр',
            'producer' => 'Продюсер',
            'composer' => 'Композитор',
            'screenwriter' => 'Автор сценария',
            'operator' => 'Оператор',
            'budget' => 'Бюджет',
            'age' => 'Возраст',
            'duration' => 'Продолжительность',
            'genres' => 'Жанр',
            'country' => 'Страна',
        ];
    }

    /**
     * @return MetadataDto
     *
     * Создаёт и фозвращяет DTO-объект
     */
    public function getDto()
    {
        return new MetadataDto(
            $this->year,
            $this->director,
            $this->producer,
            $this->composer,
            $this->screenwriter,
            $this->operator,
            $this->budget,
            $this->age,
            $this->duration,
            $this->genres,
            $this->country,
            $this->filmId
        );
    }
}