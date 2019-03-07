<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 06.03.19
 * Time: 14:51
 */

namespace frontend\query;


use common\domain\Schedule\Schedule;
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

    public function getFilm($id)
    {
        $sql = "select films.name, films.description, films.trailer_url, 
gallery_image.rank as main_poster, 
metadata.year, metadata.director, metadata.producer, metadata.composer, metadata.screenwriter, metadata.operator, metadata.budget, metadata.age, metadata.duration 
from films 
left join gallery_image on films.main_poster_id = gallery_image.id 
left join metadata on films.id = metadata.film_id 
where films.id = :id";

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);

        $res = $command->bindValue(':id', $id)->queryOne();

        $res['main_poster'] = (!empty($res['main_poster'])) ? '/posters/' . $id . '/' . $res['main_poster'] . '/original.jpg' : null;

        $sqlGenres = "select genres.name 
from metadata_genres 
join metadata on metadata_genres.metadata_id = metadata.id 
join genres on genres.id = metadata_genres.genre_id 
where metadata.film_id = :id;
";

        $commandGenres = $connection->createCommand($sqlGenres);

        $resGenres = $commandGenres->bindValue(':id', $id)->queryAll();

        $sqlCountry = "select country.name 
from metadata_country 
join metadata on metadata_country.metadata_id = metadata.id 
join country on country.id = metadata_country.country_id 
where metadata.film_id = :id;
";

        $commandCountry = $connection->createCommand($sqlCountry);

        $resCountry = $commandCountry->bindValue(':id', $id)->queryAll();

        foreach ($resGenres as $genre) {
            $res['genres'][] = $genre['name'];
        }

        foreach ($resCountry as $country) {
            $res['country'][] = $country['name'];
        }

        return $res;
    }

    public function getSchedules($id)
    {
        $sql = "select cities.name, schedules.date, schedules.type, schedules.hall, schedules.price_1, schedules.price_2, schedules.price_3 
from schedules 
join cities on schedules.city_id = cities.id 
where schedules.film_id = :id and schedules.status = :status 
order by date asc";

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);

        $res = $command
            ->bindValue(':id', $id)
            ->bindValue(':status', Schedule::STATUS_OPENED)
            ->queryAll();

        $result = [];

        foreach ($res as $item) {

            $dateTime = (new \DateTimeImmutable())->setTimestamp($item['date']);

            $formattedDate = $dateTime->format('d.m.Y');
            $formattedTime = $dateTime->format('H:i:s');

            $item['date'] = $formattedDate;
            $item['time'] = $formattedTime;

            $result[] = $item;
        }

        return $result;
    }

    public function getPosters($id)
    {
        $sql = "select rank from gallery_image where ownerId = :id";

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);

        $res = $command
            ->bindValue(':id', $id)
            ->queryAll();

        $result = [];

        foreach ($res as $item) {
            $result[] = '/posters/' . $id . '/' . $item['rank'] . '/original.jpg';;
        }

        return $result;
    }
}