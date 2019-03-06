<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 8:41
 */

namespace common\domain\Genre;


interface GenreRepositoryInterface
{
    public function save(Genre $genre);
}