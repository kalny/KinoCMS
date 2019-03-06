<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 8:51
 */

namespace backend\forms;


use backend\services\genres\GenreDto;
use yii\base\Model;

class CreateGenreForm extends Model
{
    public $name;

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