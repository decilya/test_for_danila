<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'sms' => [
            'class' => 'lowbase\sms\Sms',
            'cascade' => true,
            'services' => [
                'smsc_ru' => [
                    'class' => 'lowbase\sms\services\SmscRuService',
                    'login' => 'clubtech', // по-хорошему нужно вынести в .env, но это только простое тестовое
                    'password' => '20101986Gal!', // по-хорошему нужно вынести в .env, но это только простое тестовое
                    'order' => 1,
                ],
            ],
        ],
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
    ],
];
