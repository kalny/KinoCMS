<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 9:21
 */

namespace backend\forms;


use backend\services\cities\CityDto;
use common\domain\City\City;
use yii\base\Model;

class EditCityForm extends Model
{
    public $name;

    public function __construct(City $city, array $config = [])
    {
        parent::__construct($config);

        $this->name = $city->name;
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