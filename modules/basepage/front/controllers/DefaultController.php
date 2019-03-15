<?php

namespace app\modules\basepage\front\controllers;

use app\modules\custom_variables\models\CustomVariables;
use mtemplate\mcontrollers\MBTController;
use yii\web\NotFoundHttpException;

class DefaultController extends MBTController
{

    public function actionIndex()
    {
        $this->setMeta(\Yii::t('front', 'Главная'));
        return $this->render('index');
    }

    public function actionError()
    {
        $this->setMeta(\Yii::t('front', 'Страница не найдена'));
        return $this->render('error');
    }
}
