<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 04.03.19
 * Time: 11:37
 */

namespace common\domain\Film;


use yii\db\ActiveRecord;

/**
 * Film model
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $trailer_url
 * @property integer $main_poster_id
 */
class Film extends ActiveRecord
{
    use GalleryTrait;

    public static function tableName()
    {
        return '{{films}}';
    }

    public static function create($name, $description, $trailerUrl)
    {
        $film = new self();

        $film->name = $name;
        $film->description = $description;
        $film->trailer_url = $trailerUrl;

        return $film;
    }

    public function edit($name, $description, $trailerUrl, $mainPosterId = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->trailer_url = $trailerUrl;
        $this->main_poster_id = $mainPosterId;
    }

    public function getSeo()
    {
        return FilmSeo::find()->where(['film_id' => $this->id]);
    }

    public function getMetadata()
    {
        return Metadata::find()->where(['film_id' => $this->id]);
    }
}