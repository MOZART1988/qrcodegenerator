<?php

namespace app\modules\translate\models;

use mtemplate\mclasses\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "source_message".
 *
 * @property integer $id
 * @property string $category
 * @property string $message
 *
 * @property Message[] $messages
 */
class SourceMessage extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'source_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['category'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('translate', 'ID'),
            'category' => Yii::t('translate', 'Категория'),
            'message' => Yii::t('translate', 'Текст для перевода'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['id' => 'id']);
    }

    public static function getMissingTranslate($language)
    {
        $items = self::find()->onCondition('id NOT IN (SELECT id FROM message WHERE language=:language)', [':language' => $language])->all();

        return ArrayHelper::map($items, 'id', 'message', 'category');
    }
}
