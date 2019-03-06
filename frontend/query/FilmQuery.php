<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 14:51
 */

namespace frontend\query;


use Yii;

class FilmQuery
{
    public function getFilms()
    {
        $sql = "select films.id, films.name, gallery_image.rank, metadata.age, min(schedules.date) as date
from films 
join schedules on films.id = schedules.film_id 
left join gallery_image on films.main_poster_id = gallery_image.id 
left join metadata on films.id = metadata.film_id
group by films.id, films.name, gallery_image.rank, metadata.age
order by films.name ASC, date ASC;";

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);

        $res = $command->queryAll();

        $result = [];

        foreach ($res as $item) {

            $formattedDate = (new \DateTimeImmutable())->setTimestamp($item['date'])->format('d.m.Y');

            if ((int)$item['date'] > time()) {
                $item['date'] = 'С ' . $formattedDate . ' в кино';
            } else {
                $item['date'] = 'Сейчас в кино';
            }

            $result[] = $item;
        }

        return $result;
    }
}