<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'defaultRoute' => 'site',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'DSsZLn0cRCr5gbbXIrKtOKN1R70VlHau',
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,  //开启url美化
            'showScriptName' => false,  //隐藏index.php
//            'suffix' => ".html",
            'rules' => [
                'site/resetpwd/<token:.*?>/<nonce:\d+>/<time:\d+>'=>'site/resetpwd',
                'site/getpass/<id:.*?>' => 'site/getpass',
                'apitool/<id:.*?>'=>'apitrial/index',
                //app sdk下载
                'app/download/<category:\d+>/<version:\w.+>'=>'app/download',
                //统计导出url处理
                'stat/export/<appId:.*?>/<start:.*?>/<end:.*?>'=>'stat/export',
                'stat/exportmsg/<appId:.*?>/<type:\d>/<start:.*?>/<end:.*?>'=>'stat/exportmsg',
                'stat/indexnew/<server:\d>/<id:.*?>'=>'stat/indexnew',
                'stat/business/<server:\d>/<id:.*?>'=>'stat/business',
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:.*?>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                //app 操作 单词一律必须小写
                //'app/operview/<id:\d+>/<oper:\w+>'=>'app/operview',
                //登陆页面
                'signin/'=>'site/login',
                //注册
                'signup/'=>'site/signup',
                'resetpwd/'=>'site/findpwd',
                //密码重置
                //  'site/resetpwd/<email:\w.+>/<id:\w.+>'=>'site/resetpwd',
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1','192.168.*.*'],
    ];
}

return $config;
