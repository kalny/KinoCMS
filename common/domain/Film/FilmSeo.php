<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 04.03.19
 * Time: 12:47
 */

namespace common\domain\Film;


use yii\db\ActiveRecord;

/**
 * FilmSeo model
 *
 * @property integer $id
 * @property integer $film_id
 * @property string $title
 * @property string $description
 * @property integer $keywords
 */
class FilmSeo extends ActiveRecord
{
    public static function tableName()
    {
        return '{{films_seo}}';
    }

    public static function create($seoTitle, $seoDescription, $seoKeywords)
    {
        $filmSeo = new self();

        $filmSeo->title = $seoTitle;
        $filmSeo->description = $seoDescription;
        $filmSeo->keywords = $seoKeywords;

        return $filmSeo;
    }

    public function edit($seoTitle, $seoDescription, $seoKeywords)
    {
        $this->title = $seoTitle;
        $this->description = $seoDescription;
        $this->keywords = $seoKeywords;
    }
}