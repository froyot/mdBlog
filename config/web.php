<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'blog' => [
            'class' => 'app\blog\Blog',
        ],
        'admin' => [
            'class' => 'app\admin\Admin',
        ],
        'import' => [
            'class' => 'app\import\Import',
        ],
        'api' => [
            'class' => 'app\Api\Api',
        ],
    ],
    'defaultRoute'=>'blog/default/index',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'asd12312fasdfasdfasdfafasfdasdf',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
           'showScriptName' => false,
           'enablePrettyUrl'=>true,
        ],
        'assetManager' => [
            'baseUrl' => '@web/web/assets',
            'basePath'=>'@webroot/web/assets',
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] =
    [
    'class'=>'yii\debug\Module',
        'allowedIPs' => ['*', '127.0.0.1', '::1']
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
    'class'=>'yii\gii\Module',
        'allowedIPs' => ['*', '127.0.0.1', '::1']
    ];
}

return $config;
