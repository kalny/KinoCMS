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
 */
class Film extends ActiveRecord
{
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

    public function edit($name, $description, $trailerUrl)
    {
        $this->name = $name;
        $this->description = $description;
        $this->trailer_url = $trailerUrl;
    }

    public function getSeo()
    {
        return FilmSeo::find()->where(['film_id' => $this->id]);
    }
}