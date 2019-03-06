<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 9:08
 */

namespace common\domain\City;


use yii\db\ActiveRecord;

/**
 * City model
 *
 * @property integer $id
 * @property string name

 */
class City extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%cities}}';
    }

    public static function create($name)
    {
        $city = new self();

        $city->name = $name;

        return $city;
    }

    public function edit($name)
    {
        $this->name = $name;
    }
}