<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 04.03.19
 * Time: 11:19
 */

namespace backend\forms;

use backend\services\films\FilmDto;
use yii\base\Model;

/**
 * Class CreateFilmForm
 * @package backend\forms
 *
 *
 * Форма создания фильма
 */
class CreateFilmForm extends Model
{
    public $name;
    public $description;
    public $trailerUrl;

    public $seoTitle;
    public $seoDescription;
    public $seoKeywords;

    public function rules()
    {
        return [
            [['name', 'description', 'seoTitle'], 'required'],
            [['name', 'description', 'trailerUrl', 'seoTitle', 'seoDescription', 'seoKeywords'], 'string'],
        ];
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
            $this->trailerUrl
        );
    }
}