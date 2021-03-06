<?php

return [
    'app_info' => [
        'name' => 'abit',
        'description' => 'Abit Slim Starter Kit',
        'version' => '1.0.0',
        'company' => '<b>A.B.I.T</b> <small>SOLUTIONS</small>',
        'companyUrl' => 'https://www.facebook.com/abitsolutions',
        'author' => 'ABIT SOLUTION',
        'authorUrl' => 'https://abitsolution.com'
    ],
    'settings' => [
        'mode' => 'dev',
        'determineRouteBeforeAppMiddleware' => true,
        'displayErrorDetails' => true,
        'debugger' => false,
        'timezone' => 'Asia/Phnom_Penh',
        'imageUpload' => [
            'location'  => 'img' . DIRECTORY_SEPARATOR,
            'defaultName' => 'noimage.jpg'
        ],
        'avatar' => [
            'location' => 'img' . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR,
            'defaultName' => 'default.png'
        ],
        'twig' => [
            'path' => __DIR__ . '/views',
            'options' => [
                'cache' => false,
                'debug' => true,
            ]
        ],
        'eloquent' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => '',
            'username' => '',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci'
        ]
    ]
];
