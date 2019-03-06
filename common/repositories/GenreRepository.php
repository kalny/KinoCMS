<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 8:41
 */

namespace common\repositories;


use common\domain\Genre\Genre;
use common\domain\Genre\GenreRepositoryInterface;

class GenreRepository implements GenreRepositoryInterface
{

    public function save(Genre $genre)
    {
        if (!$genre->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }
}