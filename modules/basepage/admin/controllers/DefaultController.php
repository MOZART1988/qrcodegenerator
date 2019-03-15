<?php
/**
 * Created by PhpStorm.
 * User: MOZART
 * Date: 03.09.2017
 * Time: 15:40
 */

namespace app\modules\basepage\admin\controllers;


use mtemplate\mcontrollers\MBTAController;

class DefaultController extends MBTAController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionError()
    {
        return $this->render('error');
    }
}