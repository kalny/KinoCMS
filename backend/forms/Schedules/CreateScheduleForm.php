<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 10:59
 */

namespace backend\forms\Schedules;


use backend\services\schedules\CreateScheduleDto;
use yii\base\Model;

class CreateScheduleForm extends Model
{
    public $cityId;
    public $type;
    public $date;
    public $hall;

    public $price1;
    public $price2;
    public $price3;

    public function rules()
    {
        return [
            [['cityId', 'type'], 'integer'],
            [['price1', 'price2', 'price3'], 'double'],
            ['hall', 'string'],
            ['date', 'string'],
            [['cityId', 'type', 'date', 'hall', 'price1', 'price2', 'price3'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'cityId' => 'Город',
            'type' => 'Тип',
            'date' => 'Дата',
            'hall' => 'Кинозал',
            'price1' => 'Цена 1',
            'price2' => 'Цена 2',
            'price3' => 'Цена 3'
        ];
    }

    public function getDto()
    {
        return new CreateScheduleDto(
            $this->cityId,
            $this->type,
            $this->date,
            $this->hall,
            $this->price1,
            $this->price2,
            $this->price3
        );
    }
}