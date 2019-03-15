<?php
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
setlocale(LC_ALL, 'ru_RU.UTF-8');
setlocale(LC_NUMERIC, 'ru_RU.UTF-8');
date_default_timezone_set('Asia/Almaty');

$app = dirname(__DIR__);
$vendorPath = $app . '/vendor';
$result = [
    'yiiPath' => $vendorPath . '/yiisoft/yii2/Yii.php',
    'yiiDebug' => true,
    'aliases' => [
        'vendor' => $vendorPath,
        'root' => $app,
        //'runtime' => $app . "/runtime",
        'web' => $app . '/web',
        'media' => $app . '/web/media',
        'tests' => $app . '/tests',
        'console' => $app . '/console',
    ],
    'classMap' => [

    ],
    'web' => [
        'basePath' => dirname(__DIR__),
        'name' => 'MTEMPLATE',
        'id' => 'MTEMPLATE',
        'language' => 'ru',
        'sourceLanguage' => 'ru',
        'bootstrap' => ['log'],
        'timeZone' => 'Asia/Almaty',
        'defaultRoute' => 'basepage/default/index',
        'modules' => [
            'gridview' =>  [
                'class' => '\kartik\grid\Module'
            ],
            'basepage' => [
                'class' => 'app\modules\basepage\Module',
            ],
            'users' => [
                'class' => 'app\modules\users\Module',
            ],
            'languages' => [
                'class' => 'app\modules\languages\Module'
            ],
            'menu' => [
                'class' => 'app\modules\menu\Module'
            ],
            'custom_variables' => [
                'class' => \app\modules\custom_variables\Module::class
            ],
            'translate' => [
                'class' => \app\modules\translate\Module::class
            ],
            'promo_codes' => [
                'class' => \app\modules\promo_codes\Module::class
            ]
        ],
        'components' => [
            'request' => [
                'enableCsrfValidation' => true,
                'cookieValidationKey' => 'sdfepioDzxqwf3246dfgkljdsa'
            ],
            'cache' => [
                'class' => \yii\caching\FileCache::class
            ],
            'urlManager' => [
                'enablePrettyUrl' => true,
                'showScriptName' => false,
            ],
            'user' => [
                'identityClass' => 'app\modules\users\models\UserIdentity',
                'enableAutoLogin' => true,
            ],
            'errorHandler' => [
                'errorAction' => 'basepage/default/error',
            ],
            'mailer' => [
                'class' => 'yii\swiftmailer\Mailer',
                // send all mails to a file by default. You have to set
                // 'useFileTransport' to false and configure a transport
                // for the mailer to send real emails.
                'useFileTransport' => false,
            ],
            'log' => [
                'traceLevel' => 3,
                'targets' => [
                    [
                        'class' => 'yii\log\FileTarget',
                        'levels' => ['error', 'warning'],
                    ],
                ],
            ],
            'formatter' => [
                'defaultTimeZone' => 'Asia/Almaty',
                'timeZone' => 'Asia/Almaty',
            ],
            'db' => [
                'class' => 'yii\db\Connection',
                'charset' => 'utf8',
            ],
            'i18n' => [
                'translations' => [
                    '*' => [
                        'class' => 'yii\i18n\DbMessageSource'
                    ],
                ],
            ],
        ],
        'params' => [
        ],
    ],
    'console' => [
        'id' => 'mozart-base-template-console',
        'basePath' => dirname(__DIR__),
        'bootstrap' => ['log'],
        'controllerNamespace' => 'app\console\controllers',
        'components' => [
            'log' => [
                'targets' => [
                    [
                        'class' => 'yii\log\FileTarget',
                        'levels' => ['error', 'warning'],
                    ],
                ],
            ],
            'fs' => [
                'class' => 'creocoder\flysystem\LocalFilesystem',
                'path' => '@web/media',
            ],
        ]
    ],
];
return $result;
