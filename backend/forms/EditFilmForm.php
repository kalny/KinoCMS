<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 04.03.19
 * Time: 11:19
 */

namespace backend\forms;

use backend\services\films\FilmDto;
use common\domain\Film\Film;
use yii\base\Model;

/**
 * Class EditFilmForm
 * @package backend\forms
 *
 *
 * Форма редактирования фильма
 */
class EditFilmForm extends Model
{
    public $name;
    public $description;
    public $trailerUrl;

    public $seoTitle;
    public $seoDescription;
    public $seoKeywords;

    public $mainPosterId;

    public function rules()
    {
        return [
            ['mainPosterId', 'integer'],
            [['name', 'description', 'seoTitle'], 'required'],
            [['name', 'description', 'trailerUrl', 'seoTitle', 'seoDescription', 'seoKeywords'], 'string'],
        ];
    }

    public function __construct(Film $film, array $config = [])
    {
        parent::__construct($config);

        $this->name = $film->name;
        $this->description = $film->description;
        $this->trailerUrl = $film->trailer_url;

        $filmSeo = $film->getSeo()->one();

        if ($filmSeo) {
            $this->seoTitle = $filmSeo->title;
            $this->seoDescription = $filmSeo->description;
            $this->seoKeywords = $filmSeo->keywords;
        }

        $this->mainPosterId = $film->main_poster_id;

    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название фильма',
            'description' => 'Описание',
            'trailerUrl' => 'Ссылка на трейлер',

            'seoTitle' => 'Title (SEO)',
            'seoDescription' => 'Description (SEO)',
            'seoKeywords' => 'Keywords (SEO)',

            'mainPosterId' => 'Главный постер',
        ];
    }

    /**
     * @return FilmDto
     *
     * Создаёт и фозвращяет DTO-объект
     */
    public function getDto()
    {
        return new FilmDto(
            $this->name,
            $this->description,
            $this->seoTitle,
            $this->seoDescription,
            $this->seoKeywords,
            $this->trailerUrl,
            $this->mainPosterId
        );
    }
}