<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 8:00
 */

namespace backend\forms;


use backend\services\countries\CountryDto;
use yii\base\Model;

class CreateCountryForm extends Model
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
        return new CountryDto(
            $this->name
        );
    }
}