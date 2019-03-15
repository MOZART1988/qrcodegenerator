<?php

namespace app\modules\promo_codes\models;

use mtemplate\mclasses\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "promo_codes".
 *
 * @property integer $id
 * @property string $create_date
 * @property string $update_date
 * @property integer $is_active
 * @property string $code
 *
 */
class PromoCodes extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'promo_codes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['code'], 'string'],
            [['is_active'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('users', 'ID'),
            'create_date' => Yii::t('admin', 'Дата создания'),
            'update_date' => Yii::t('admin', 'Дата обновления'),
            'code' => Yii::t('admin', 'Промокод'),
            'is_active' => Yii::t('admin', 'is_active')
        ];
    }

    public function behaviors()
    {
        return [
            'Timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_date', 'update_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_date']
                ],
                'value' => new Expression('NOW()'),
            ]
        ];
    }
}
