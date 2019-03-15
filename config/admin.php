<?php
$result = [
    'web' => array(
        'basePath' => dirname(__DIR__),
        'name' => 'MTEMPLATE',
        'language' => 'ru',
        'defaultRoute' => 'basepage/default/index',
        'components' => [
            'assetManager' => [
                'bundles' => [
                    'yii\bootstrap\BootstrapAsset' => [
                        'sourcePath' => null,   // do not publish the bundle,
                        'css' => [],
                        'js' => []
                    ],
                    'yii\bootstrap\BootstrapPluginAsset' => [
                        'sourcePath' => null,   // do not publish the bundle,
                        'css' => [],
                        'js' => []
                    ],
                ],
            ],
            'session' => [
                'timeout' => 86400 * 30
            ],
            'urlManager' => [
                'enablePrettyUrl' => true,
                'showScriptName' => true,
                'rules' => [
                    '<module>/<action>' => '<module>/default/<action>',
                    '<module>/<controller>/<action>' => '<module>/<controller>/<action>',
                ]
            ],
            'user' => [
                'identityClass' => 'app\modules\users\models\UserIdentity',
                'enableAutoLogin' => true,
                'loginUrl' => ['/users/default/login'],
                'authTimeout' => 86400 * 30,
                'absoluteAuthTimeout' => 86400 * 30
            ],
        ],
        'params' => [
            'yiiEnd' => 'admin',
            'users' => [
                'image' => [
                    'size' => [386, 263]
                ]
            ],
            'menu' => [
                'types' => [
                    'pages_view' => [
                        'name' => 'Просмотр страницы',
                        'route' => 'pages/default/index',
                        'params' => ['category', 'sefname'],
                    ],
                    'mainpage' => [
                        'name' => 'Главная страница',
                        'route' => 'mainpage/default/index'
                    ],
                    'content_view' => [
                        'name' => 'Просмотр текстовой страницы',
                        'route' => 'content/default/index',
                        'params' => ['sefname']
                    ],
                    'category_view' => [
                        'name' => 'Просмотр категории',
                        'route' => 'pages/default/category',
                        'params' => ['sefname'],
                    ],
                    'category_view_date' => [
                        'name' => 'Просмотр категории с датой',
                        'route' => 'pages/default/category',
                        'params' => ['sefname', 'date'],
                    ],
                    'module_external' => [
                        'name' => 'Внешняя ссылка внутри сайта',
                        'route' => false
                    ],
                    'external' => [
                        'name' => 'Внешняя ссылка с сайта',
                        'route' => false
                    ],
                ]
            ],
            'ckeditor' => [
                'language' => 'ru',
                'height' => 500,
                'allowedContent' => true,
                'contentsCss' => '/css/editor.css?' . time(),
                'toolbar' => [
                    [
                        'name' => 'clipboard',
                        'groups' => ['clipboard', 'undo'],
                        'items' => ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
                    ],
                    [
                        'name' => 'basicstyles',
                        'groups' => ['basicstyles', 'cleanup'],
                        'items' => [
                            'Bold',
                            'Italic',
                            'Underline',
                            'Strike',
                            'Subscript',
                            'Superscript',
                            '-',
                            'RemoveFormat'
                        ]
                    ],
                    [
                        'name' => 'paragraph',
                        'groups' => ['list', 'indent', 'blocks', 'align', 'bidi'],
                        'items' => [
                            'NumberedList',
                            'BulletedList',
                            '-',
                            'Blockquote',
                            '-',
                            'JustifyLeft',
                            'JustifyCenter',
                            'JustifyRight',
                            'JustifyBlock'
                        ]
                    ],
                    '/',
                    ['name' => 'links', 'items' => ['Link', 'Unlink', 'Anchor']],
                    [
                        'name' => 'insert',
                        'items' => [
                            'Image',
                            'Flash',
                            'Table',
                            'Gallery',
                            'oembed',
                            'Youtube',
                            'HorizontalRule',
                            'Smiley',
                            'SpecialChar',
                            'Iframe'
                        ]
                    ],
                    ['name' => 'styles', 'items' => ['Format']],
                    ['name' => 'colors', 'items' => ['TextColor', 'BGColor']],
                    [
                        'name' => 'document',
                        'groups' => ['mode', 'document', 'doctools'],
                        'items' => ['Source']
                    ]
                ],
                'extraPlugins' => 'gallery,youtube',
                'filebrowserBrowseUrl' => '/js/ckfinder/ckfinder.html',
                'filebrowserImageBrowseUrl' => '/js/ckfinder/ckfinder.html?type=Images',
                'filebrowserFlashBrowseUrl' => '/js/ckfinder/ckfinder.html?type=Flash',
            ]
        ],
    ),
];
return $result;
