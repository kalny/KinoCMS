<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 05.03.19
 * Time: 10:08
 */

namespace common\domain\Film;


use Yii;
use zxbodya\yii2\galleryManager\GalleryBehavior;

trait GalleryTrait
{
    public function behaviors()
    {
        return [
            'galleryBehavior' => [
                'class' => GalleryBehavior::class,
                'type' => 'film',
                'extension' => 'jpg',
                'directory' => Yii::getAlias('@backend/web') . '/posters',
                'url' => '/posters',
                'versions' => [
                    'small' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(200, 200));
                    },
                    'medium' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        $dstSize = $img->getSize();
                        $maxWidth = 800;
                        if ($dstSize->getWidth() > $maxWidth) {
                            $dstSize = $dstSize->widen($maxWidth);
                        }
                        return $img
                            ->copy()
                            ->resize($dstSize);
                    },
                ]
            ]
        ];
    }
}