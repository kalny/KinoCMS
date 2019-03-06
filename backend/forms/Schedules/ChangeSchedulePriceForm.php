<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 11:15
 */

namespace backend\forms\Schedules;


use backend\services\schedules\ChangeSchedulePriceDto;
use yii\base\Model;

class ChangeSchedulePriceForm extends Model
{
    public $price1;
    public $price2;
    public $price3;

    public function rules()
    {
        return [
            [['price1', 'price2', 'price3'], 'double'],
            [['price1', 'price2', 'price3'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'price1' => 'Цена 1',
            'price2' => 'Цена 2',
            'price3' => 'Цена 3'
        ];
    }

    public function getDto()
    {
        return new ChangeSchedulePriceDto(
            $this->price1,
            $this->price2,
            $this->price3
        );
    }
}