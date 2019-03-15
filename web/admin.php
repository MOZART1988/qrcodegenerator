<?php
/**
 * Set environment
 */
//ini_set('display_errors', 'On');
//ini_set('intl.default_locale', 'ru-RU');
date_default_timezone_set('Asia/Almaty');
require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../mtemplate/vendor/autoload.php');

putenv('YII_ENV=' . trim(file_get_contents(dirname(__FILE__) . '/../config/mode.php')));
putenv('YII_END=admin');
$env = new \mtemplate\mclasses\MBTEnvironment(
    [
        dirname(__DIR__) . '/config'
    ]
);
$env->setup();
$application = new yii\web\Application($env->web);
$application->run();
