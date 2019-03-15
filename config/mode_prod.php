<?php
return [
    'yiiDebug' => true,
    'yiiEnv' => 'prod',
    'web' => [
        'components' => [
            'db' => [
                'dsn' => 'mysql:host=localhost;dbname=mtemplate',
                'username' => 'root',
                'password' => '',
                'enableSchemaCache' => false,
                'schemaCacheDuration' => 86400
            ],
            'cache' => [
                'class' => 'yii\caching\DummyCache',
            ],
        ],
    ],
    'console' => [
        'components' => [
            'db' => [
                'class' => '\yii\db\Connection',
                'dsn' => 'mysql:host=localhost;dbname=mtemplate',
                'username' => 'root',
                'password' => '',
                'enableSchemaCache' => false,
                'schemaCacheDuration' => 86400
            ],
        ],
    ]
];
