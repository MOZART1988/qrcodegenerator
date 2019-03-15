<?php
/**
 * Created by PhpStorm.
 * User: MOZART
 * Date: 03.09.2017
 * Time: 12:56
 */

namespace mtemplate\mclasses;


use yii\base\Module;

class MBTModule extends Module
{
    protected $endName;
    private $_viewPath;
    public $name;

    public function init()
    {

        $this->endName = \yii::$app->params['yiiEnd'];

        if ($this->controllerNamespace === null) {
            $class = get_class($this);
            if (($pos = strrpos($class, '\\')) !== false) {
                $this->controllerNamespace = substr($class, 0, $pos) . '\\' . $this->endName . '\\controllers';
            }
        }

    }

    public function getViewPath()
    {
        if ($this->_viewPath !== null) {
            return $this->_viewPath;
        } else {
            return $this->getBasePath() . DIRECTORY_SEPARATOR . $this->endName . DIRECTORY_SEPARATOR . 'views';
        }
    }
}