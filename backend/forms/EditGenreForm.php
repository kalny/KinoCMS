<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 8:51
 */

namespace backend\forms;


use backend\services\genres\GenreDto;
use common\domain\Genre\Genre;
use yii\base\Model;

class EditGenreForm extends Model
{
    public $name;

    public function __construct(Genre $genre, array $config = [])
    {
        parent::__construct($config);

        $this->name = $genre->name;
    }

    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название',
        ];
    }

    public function getDto()
    {
        return new GenreDto(
            $this->name
        );
    }
}