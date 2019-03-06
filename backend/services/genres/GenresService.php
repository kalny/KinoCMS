<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 8:39
 */

namespace backend\services\genres;


use common\domain\Genre\Genre;
use common\domain\Genre\GenreRepositoryInterface;

class GenresService
{
    /**
     * @var GenreRepositoryInterface
     */
    private $repository;

    public function __construct(GenreRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function createGenre(GenreDto $genreDto)
    {
        $genre = Genre::create(
            $genreDto->name
        );

        $this->repository->save($genre);

        return $genre;
    }

    public function editGenre(Genre $genre, GenreDto $genreDto)
    {
        $genre->edit(
            $genreDto->name
        );

        $this->repository->save($genre);
    }
}