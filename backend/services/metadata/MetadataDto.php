<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 05.03.19
 * Time: 15:32
 */

namespace backend\services\metadata;

/**
 * Class MetadataDto
 * @package backend\services\metadata
 *
 *
 * Объект - DTO для переноса данных из формы в сервис
 */
class MetadataDto
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

    public function __construct($year, $director, $producer, $composer, $screenwriter, $operator, $budget, $age, $duration, $genres = null, $country = null, $filmId = null)
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
        $this->genres = $genres;
        $this->country = $country;
        $this->filmId = $filmId;
    }
}