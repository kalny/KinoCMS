<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 9:20
 */

namespace backend\forms\City;


use backend\services\cities\CityDto;
use yii\base\Model;

class CreateCityForm extends Model
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
            'name' => 'Наименование',
        ];
    }

    public function getDto()
    {
        return new CityDto(
            $this->name
        );
    }
}