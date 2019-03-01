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
        'films'             => 'films/index',
        'films/edit/<id>'   => 'films/edit',
        'films/add'         => 'films/add',
        'news'              => 'news/index',
        'news/edit/<id>'    => 'news/edit',
        'news/add'          => 'news/add',
    ]
];