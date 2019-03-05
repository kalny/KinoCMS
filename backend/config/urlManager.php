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
        'films/galleryApi'  => 'films/galleryApi',
        'login'             => 'site/login',
        'logout'            => 'site/logout',
        'films'             => 'films/index',
        'films/edit/<id>'   => 'films/edit',
        'films/add'         => 'films/add',
        'films/delete'      => 'films/delete',
        'films/<id>'        => 'films/view',
        'films/meta/<id>'   => 'metadata/view',
        'films/edit-metadata/<id>'   => 'metadata/edit',
        'news'              => 'news/index',
        'news/edit/<id>'    => 'news/edit',
        'news/add'          => 'news/add',
        'news/delete'       => 'news/delete',
        'news/<id>'         => 'news/view',
    ]
];