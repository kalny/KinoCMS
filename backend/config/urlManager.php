<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 10:53
 */

return [
    'class' => 'yii\web\UrlManager',
    'hostInfo' => $params['backendHostInfo'],
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        'films/galleryApi'          => 'films/galleryApi',
        'login'                     => 'site/login',
        'logout'                    => 'site/logout',

        'films'                     => 'films/index',
        'films/edit/<id>'           => 'films/edit',
        'films/add'                 => 'films/add',
        'films/delete'              => 'films/delete',
        'films/<id>'                => 'films/view',
        'films/meta/<id>'           => 'metadata/view',
        'films/edit-metadata/<id>'  => 'metadata/edit',
        'films/add-metadata/<id>'   => 'metadata/add',

        'countries'                 => 'countries/index',
        'countries/add'             => 'countries/add',
        'countries/edit/<id>'       => 'countries/edit',
        'countries/delete'          => 'countries/delete',

        'genres'                    => 'genres/index',
        'genres/add'                => 'genres/add',
        'genres/edit/<id>'          => 'genres/edit',
        'genres/delete'             => 'genres/delete',

        'cities'                    => 'cities/index',
        'cities/add'                => 'cities/add',
        'cities/edit/<id>'          => 'cities/edit',
        'cities/delete'             => 'cities/delete',

        'news'                      => 'news/index',
        'news/edit/<id>'            => 'news/edit',
        'news/add'                  => 'news/add',
        'news/delete'               => 'news/delete',
        'news/<id>'                 => 'news/view',
    ]
];