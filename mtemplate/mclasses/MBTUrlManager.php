<?php
/**
 * Created by PhpStorm.
 * User: MOZART
 * Date: 19.09.2017
 * Time: 22:48
 */

namespace mtemplate\mclasses;


use app\modules\languages\models\Languages;
use yii\web\UrlManager;

class MBTUrlManager extends UrlManager
{
    public function createUrl($params)
    {
        if (isset($params['lang_id'])) {
            //Если указан идентификатор языка, то делаем попытку найти язык в БД,
            //иначе работаем с языком по умолчанию
            $lang = Languages::findOne($params['lang_id']);

            if ($lang === null) {
                $lang = Languages::getDefaultLang();
            }
            //unset($params['lang_id']);
        } else {
            //Если не указан параметр языка, то работаем с текущим языком
            $lang = Languages::getCurrent();
        }

        //Получаем сформированный URL(без префикса идентификатора языка)
        $url = parent::createUrl($params);
        //Добавляем к URL префикс - буквенный идентификатор языка
        if ($lang->code != 'ru') {
            if ($url == '/') {
                return '/' . $lang->code;
            } else {
                return '/' . $lang->code . $url;
            }
        }

        return $url;

    }
}