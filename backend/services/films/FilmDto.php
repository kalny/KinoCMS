<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 04.03.19
 * Time: 11:29
 */

namespace backend\services\films;

/**
 * Class FilmDto
 * @package backend\services\films
 *
 *
 * Объект - DTO для переноса данных из формы в сервис
 */
class FilmDto
{
    public $name;
    public $description;
    public $seoTitle;
    public $seoDescription;
    public $seoKeywords;
    public $trailerUrl;
    public $mainPosterId;

    public function __construct($name, $description, $seoTitle, $seoDescription, $seoKeywords, $trailerUrl, $mainPosterId)
    {

        $this->name = $name;
        $this->description = $description;
        $this->seoTitle = $seoTitle;
        $this->seoDescription = $seoDescription;
        $this->seoKeywords = $seoKeywords;
        $this->trailerUrl = $trailerUrl;
        $this->mainPosterId = $mainPosterId;
    }
}