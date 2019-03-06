<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 8:44
 */

namespace backend\services\genres;


class GenreDto
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}