<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 8:23
 */

namespace backend\forms\Country;


use backend\services\countries\CountryDto;
use common\domain\Country\Country;
use yii\base\Model;

class EditCountryForm extends Model
{
    public $name;

    public function __construct(Country $country, array $config = [])
    {
        parent::__construct($config);

        $this->name = $country->name;
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
        return new CountryDto(
            $this->name
        );
    }
}