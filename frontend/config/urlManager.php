<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 01.03.19
 * Time: 10:53
 */

return [
    'class' => 'yii\web\UrlManager',
    'hostInfo' => $params['frontendHostInfo'],
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        ''              => 'site/index',
        'about'         => 'site/about',
        'about/news'    => 'site/news',
        'signup'        => 'site/signup',
        'login'         => 'site/login',
        'affiche'       => 'cinema/affiche',
        'film/<id>'     => 'cinema/film',
    ]
];