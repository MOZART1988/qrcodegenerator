<?php
/**
 * Created by PhpStorm.
 * User: evgeniy
 * Date: 9/24/14
 * Time: 14:49
 */

namespace app\modules\translate\events;


use mtemplate\mclasses\ActiveRecord;
use app\modules\translate\models\Message;
use app\modules\translate\models\SourceMessage;
use yii\i18n\MissingTranslationEvent;

class MissingTranslationHandler
{
    public static function handleMissingTranslation(MissingTranslationEvent $event)
    {
        /**
         * @var $model \app\modules\translate\models\SourceMessage
         */
        $model = SourceMessage::find()->where(['category' => $event->category, 'message' => $event->message])->one();
        if ($model === null) {

            $model = new SourceMessage;
            $model->category = $event->category;
            $model->message = $event->message;
            if (!$model->save()) {
                \Yii::warning('Не удалось сохранить перевод для ' . $event->category . '.' . $event->message);
            }
        }

        if (\Yii::$app->getI18n()->getMessageSource('*')->forceTranslation === false && $model !== null && $model instanceof ActiveRecord) {
            $messageModel = new Message;
            $messageModel->id = $model->id;
            $messageModel->language = $event->language;
            $messageModel->translation = $event->message;
            if ($messageModel->save()) {
                return $event;
            }
        }

        return $event;
    }
}
