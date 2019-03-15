<?php
/**
 * Created by PhpStorm.
 * User: MOZART
 * Date: 19.09.2017
 * Time: 21:57
 */

namespace app\modules\custom_variables\models;


use app\modules\languages\models\Languages;
use yii\db\ActiveQuery;

class CustomVariablesQuery extends ActiveQuery
{
    public function setLanguage()
    {
        if (\Yii::$app->params['yiiEnd'] == 'admin') {
            $this->andWhere(['custom_variables.lang_id' => Languages::getAdminCurrent()->id]);
        } else {
            $this->andWhere(['custom_variables.lang_id' => Languages::getCurrent()->id]);
        }

        return $this;
    }
}