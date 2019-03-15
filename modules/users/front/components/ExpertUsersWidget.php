<?php
/**
 * Created by PhpStorm.
 * User: yevgeniy
 * Date: 11/19/14
 * Time: 12:13 PM
 */

namespace app\modules\users\front\components;


use app\modules\pages\models\Pages;
use app\modules\users\models\Users;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class ExpertUsersWidget extends Widget
{


    public function run()
    {

        $users = \Yii::$app->db->cache(function () {
            $pages = Pages::find()->select(['user_id'])->where(['is_expert' => 1])->groupBy(['user_id'])->asArray()->all();
            $userIds = ArrayHelper::map($pages, 'user_id', 'user_id');

            return Users::find()->where(['id' => $userIds])->all();
        }, 500);


        return $this->render('expertUsersWidget', ['users' => $users]);
    }
}
