<?php

namespace app\modules\promo_codes\admin\controllers;

use app\modules\promo_codes\models\PromoCodes;
use app\modules\promo_codes\models\PromoCodesSearch;
use mtemplate\mcontrollers\MBTAController;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * DefaultController implements the CRUD actions for PromoCodes model.
 */
class DefaultController extends MBTAController
{
    protected $_modelName = PromoCodes::class;
    public $allowedRoles = ['admin'];

    /**
     * Lists all PromoCodes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PromoCodesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the PromoCodes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PromoCodes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PromoCodes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
