<?php
/**
 * Created by PhpStorm.
 * User: evgeniy
 * Date: 7/24/14
 * Time: 12:43
 */

namespace app\modules\users\front\controllers;


use rocketfirm\engine\RFController;
use app\modules\users\models\LoginForm;
use app\modules\users\models\RegistrationForm;
use app\modules\users\models\UserIdentity;
use app\modules\users\models\Users;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class DefaultController extends RFController
{

    public function actionRegistration()
    {
        if (!\Yii::$app->user->isGuest) {
            $this->goHome();
        }
        $model = new RegistrationForm();

        if ($model->load(\Yii::$app->getRequest()->post()) && $model->registration()) {
            return $this->redirect(['success-registration']);
        }

        return $this->render('registration', ['model' => $model]);
    }

    public function actionSuccessRegistration()
    {
        return $this->render('successRegistration');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->getUser()->getIsGuest()) {
            $this->goHome();
        }

        $model = new LoginForm;

        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            $user = $model->getUser();
            if ($user->is_finish_registration == 0) {
                return $this->redirect('/users/auth');
            } else {
                return $this->goHome();
            }
        }

        return $this->render('login', ['model' => $model]);
    }

    public function actionLogout()
    {
        \Yii::$app->getUser()->logout();

        return $this->goHome();
    }

}
