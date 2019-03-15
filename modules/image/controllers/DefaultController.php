<?php

namespace app\modules\image\controllers;

use yii\web\Controller;
use Yii;
use yii\web\MethodNotAllowedHttpException;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use app\modules\image\models\Image;
use yii\web\Response;

/**
 * Default controller for the `image` module
 */
class DefaultController extends Controller {

    public function actionDeleteImage()
    {
        $id = Yii::$app->request->post('key');
        $model = Image::findOne($id);

        if ($model !== false) {
            return $model->delete();

        }

        throw new NotFoundHttpException();


    }

    public function actionSortImage($modelId, $className)
    {
        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post('sort_order');
            if ($post['oldIndex'] > $post['newIndex']) {
                $param = ['and', ['>=', 'sort_order', $post['newIndex']], ['<', 'sort_order', $post['oldIndex']]];
                $counter = 1;
            } else {
                $param = ['and', ['<=', 'sort_order', $post['newIndex']], ['>', 'sort_order', $post['oldIndex']]];
                $counter = -1;
            }
            Image::updateAllCounters(['sort_order' => $counter], [
                'and', ['model_name' => $className, 'model_id' => $modelId], $param
            ]);
            Image::updateAll(['sort_order' => $post['newIndex']], [
                'id' => $post['stack'][$post['newIndex']]['key']
            ]);
            return true;
        }
        throw new MethodNotAllowedHttpException();
    }

    public function actionChangeDescription($modelId, $description)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        if (!\Yii::$app->request->isAjax) {
            throw new MethodNotAllowedHttpException();
        }

        $model = Image::findOne($modelId);

        if ($model === null) {
            throw new NotFoundHttpException();
        }

        $model->description = $description;

        if ($model->save(false, ['description'])) {
            return ['success' => true];
        }
    }

    public function actionEditDescription($id, $description)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        if (Yii::$app->request->isAjax) {

            $image = Image::findOne($id);

            if ($image !== null) {
                $image->description = $description;

                if ($image->save(false)) {
                    return [
                        'success' => true,
                        'message' => $description
                    ];
                }
            }

            throw new NotFoundHttpException();


        }
        throw new MethodNotAllowedHttpException();
    }
}
