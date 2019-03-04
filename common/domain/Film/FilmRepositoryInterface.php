<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 04.03.19
 * Time: 12:22
 */

namespace common\domain\Film;

/**
 * Interface FilmRepositoryInterface
 * @package common\domain\Film
 *
 * Интерфейс репозитория для фильмов
 */
interface FilmRepositoryInterface
{
    public function save(Film $film, FilmSeo $filmSeo);
}