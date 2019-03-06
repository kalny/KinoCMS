<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 10:37
 */

namespace common\domain\Schedule;


use common\domain\City\City;
use common\domain\Film\Film;
use yii\db\ActiveRecord;

/**
 * Schedule model
 *
 * @property integer $id
 * @property integer $city_id
 * @property integer $film_id
 * @property integer $date
 * @property string $hall
 * @property integer $price_1
 * @property integer $price_2
 * @property integer $price_3
 * @property integer $type
 * @property integer $status
 *
 */
class Schedule extends ActiveRecord
{
    const STATUS_OPENED = 0;
    const STATUS_CLOSED = 1;

    const TYPE_3D = 0;
    const TYPE_2D = 1;
    const TYPE_IMAX = 2;

    public static function tableName()
    {
        return '{{%schedules}}';
    }

    public static function create($filmId, $cityId, $type, \DateTimeImmutable $date, $hall, $price1, $price2, $price3)
    {
        $type = (int)$type;

        if ($type !== self::TYPE_2D && $type !== self::TYPE_3D && $type !== self::TYPE_IMAX) {
            throw new \DomainException("Incorrect type");
        }

        $schedule = new self();

        $schedule->film_id = $filmId;
        $schedule->city_id = $cityId;
        $schedule->date = $date->getTimestamp();
        $schedule->hall = $hall;
        $schedule->price_1 = $price1;
        $schedule->price_2 = $price2;
        $schedule->price_3 = $price3;

        $schedule->type = $type;
        $schedule->status = self::STATUS_OPENED;

        return $schedule;
    }

    public function changeCost($price1, $price2, $price3)
    {
        $this->setPrice($price1, "price_1");
        $this->setPrice($price2, "price_2");
        $this->setPrice($price3, "price_3");
    }

    private function setPrice($price, $field) {
        if ($price > 0 && !empty($price) && !is_null($price)) {
            $this->$field = $price;
        }
    }

    public function isClosed()
    {
        return $this->status === self::STATUS_CLOSED;
    }

    public function close()
    {
        if ($this->isClosed()) {
            throw new \DomainException("Schedule already closed");
        }

        $this->status = self::STATUS_CLOSED;
    }

    public static function getTypesArray() {
        return [
            self::TYPE_3D => '3D',
            self::TYPE_2D => '2D',
            self::TYPE_IMAX => 'IMAX',
        ];
    }

    public static function getStatusesArray() {
        return [
            self::STATUS_OPENED => 'Открыт',
            self::STATUS_CLOSED => 'Закрыт',
        ];
    }

    public function getTypeString()
    {
        return self::getTypesArray()[$this->type];
    }

    public function getStatusString()
    {
        return self::getStatusesArray()[$this->status];
    }

    public function getFilm()
    {
        return $this->hasOne(Film::class, ['id' => 'film_id']);
    }

    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'city_id']);
    }


}