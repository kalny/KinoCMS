<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 05.03.19
 * Time: 13:44
 */

namespace common\domain\Genre;


use yii\db\ActiveRecord;

/**
 * Genre model
 *
 * @property integer $id
 * @property string name

 */
class Genre extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%genres}}';
    }

    public static function create($name)
    {
        $film = new self();

        $film->name = $name;

        return $film;
    }

    public function edit($name)
    {
        $this->name = $name;
    }
}