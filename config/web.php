<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'homeUrl'=>'/',
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
    'components' => [
        'response' => [
        ],
        'request' => [
            'baseUrl'=>'',
            'enableCsrfValidation'=>false,
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'OZ40Wrdk5A_GFUUYSfWWD5h_XIgefjwJ',
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
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'iramalchukova',
                'password' => 'antresol',
                'port' =>'465',
                'encryption' => 'ssl',
                // 'streamOptions' => [ 'ssl' => [ 'allow_self_signed' => true, 'verify_peer' => false, 'verify_peer_name' => false, ], ]
            ],
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //'category/<id:\d+>/page/<page:\d+>'=>'category/view',
                'index' => 'site/index',
                'article/<id:\d+>'=>'site/article',
                'article-old/<id:\d+>'=>'site/article-old',
                'antresolia' =>'site/about',

                'book'=>'site/article',
                'about-me' => 'site/about-me',
                'first-story' =>'site/first-story',
                'contact' =>'site/contact',
                'login' =>'site/login',
                'logout' =>'site/logout',
                'contract' => 'site/contract',
                'result-url' => 'site/result-url',
                'callback' => 'site/callback',
                /*interkassa*/
                'interkassa-success' => 'interkassa/success',
                'interkassa-wait' => 'interkassa/wait',
                'interkassa-error' => 'interkassa/error',

                'admin' => 'admin/default/index',
                'admin-article' => 'admin/article/',
                'admin-about-me' => 'admin/about-me/',
                'admin-first-story' => 'admin/first-story/',
                'admin-video' => 'admin/video/'
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    // $config['bootstrap'][] = 'debug';
    // $config['modules']['debug'] = [
    //    'class' => 'yii\debug\Module',
    // uncomment the following to add your IP if you are not connecting from localhost.
    // 'allowedIPs' => ['127.0.0.1', '::1'],
    //'allowedIPs' => ['176.114.5.140', '::1'],
    // ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
        //   'allowedIPs' => ['176.114.5.140', '::1'],
    ];
}

return $config;
