<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 05.03.19
 * Time: 15:19
 */

namespace backend\forms\Metadata;


use backend\services\metadata\MetadataDto;
use common\domain\Metadata\Metadata;
use yii\base\Model;

/**
 * Class EditMetadataForm
 * @package backend\forms
 *
 *
 * Форма редактирования метаданных фильма
 */
class EditMetadataForm extends Model
{
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

    public function __construct(Metadata $metadata, array $config = [])
    {
        parent::__construct($config);

        $this->year = $metadata->year;
        $this->director = $metadata->director;
        $this->producer = $metadata->producer;
        $this->composer = $metadata->composer;
        $this->screenwriter = $metadata->screenwriter;
        $this->operator = $metadata->operator;
        $this->budget = $metadata->budget;
        $this->age = $metadata->age;
        $this->duration = $metadata->duration;

        $this->genres = [];
        foreach ($metadata->genres as $item) {
            $this->genres[] = $item->id;
        }

        $this->country = [];
        foreach ($metadata->countries as $item) {
            $this->country[] = $item->id;
        }

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
            $this->country
        );
    }
}