<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 04.03.19
 * Time: 11:33
 */

namespace backend\services\films;

use common\domain\Film\Film;
use common\domain\Film\FilmRepositoryInterface;
use common\domain\Film\FilmSeo;
use yii\db\Query;

/**
 * Class FilmsService
 * @package backend\services\films
 *
 *
 * Сервис для управления фильмами
 */
class FilmsService
{
    /**
     * @var FilmRepositoryInterface
     */
    private $repository;

    /**
     * FilmsService constructor.
     * @param FilmRepositoryInterface $repository
     *
     * Конструктор, внедряем зависимость от репозитория
     *
     */
    public function __construct(FilmRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     *
     * Создать фильм и сохранить его в базе данных
     *
     * @param FilmDto $filmDto
     * @return Film
     */
    public function createFilm(FilmDto $filmDto)
    {
        $film = Film::create(
            $filmDto->name,
            $filmDto->description,
            $filmDto->trailerUrl
        );

        $filmSeo = FilmSeo::create(
            $filmDto->seoTitle,
            $filmDto->seoDescription,
            $filmDto->seoKeywords
        );

        $this->repository->save($film, $filmSeo);

        return $film;
    }

    /**
     *
     * Изменить существующий фильм
     *
     * @param Film $film
     * @param FilmSeo $filmSeo
     * @param FilmDto $filmDto
     */
    public function editFilm(Film $film, FilmSeo $filmSeo, FilmDto $filmDto)
    {
        $film->edit(
            $filmDto->name,
            $filmDto->description,
            $filmDto->trailerUrl,
            $filmDto->mainPosterId
        );
        $filmSeo->edit(
            $filmDto->seoTitle,
            $filmDto->seoDescription,
            $filmDto->seoKeywords
        );

        $this->repository->save($film, $filmSeo);
    }

    public function getPosters(Film $film)
    {
        $posters = (new Query())->select(['id', 'name'])
            ->from('{{%gallery_image}}')
            ->where(['type' => 'film'])
            ->andWhere(['ownerId' => $film->id])
            ->andWhere(['not', ['name' => null]])
            ->andWhere(['not', ['name' => '']])
            ->orderBy(['id' => SORT_DESC])
            ->all();

        return $posters;
    }
}