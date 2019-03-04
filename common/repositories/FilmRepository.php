<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 04.03.19
 * Time: 12:23
 */

namespace common\repositories;


use common\domain\Film\Film;
use common\domain\Film\FilmRepositoryInterface;
use common\domain\Film\FilmSeo;

/**
 * Class FilmRepository
 * @package common\repositories
 *
 * Репозиторий для фильмов
 */
class FilmRepository implements FilmRepositoryInterface
{

    public function save(Film $film, FilmSeo $filmSeo)
    {
        if (!$film->save()) {
            throw new \RuntimeException('Saving error.');
        }

        $filmSeo->film_id = $film->id;

        if (!$filmSeo->save()) {
            throw new \RuntimeException('Saving error.');
        }

    }

}