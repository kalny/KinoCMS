<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 05.03.19
 * Time: 13:26
 */

namespace common\domain\Country;


use yii\db\ActiveRecord;

/**
 * Country model
 *
 * @property integer $id
 * @property string name

 */
class Country extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%country}}';
    }
}