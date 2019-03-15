<?php

namespace app\modules\languages\models;

use mtemplate\mclasses\ActiveRecord;
use Yii;

/**
 * This is the model class for table "languages".
 *
 * @property integer $id
 * @property string $title
 * @property string $code
 * @property integer $is_active
 *
 */
class Languages extends ActiveRecord
{
    public static $current = null;
    public static $adminCurrent = null;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'code', 'locale'], 'required'],
            [['is_active'], 'integer'],
            [['title', 'code'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('languages', 'ID'),
            'title' => Yii::t('languages', 'Наименование'),
            'code' => Yii::t('languages', 'Код'),
            'locale' => 'Локаль',
            'is_active' => Yii::t('languages', 'Активность'),
        ];
    }

    public static function getLangIdByCode($code)
    {
        $language = self::find()->where(['code' => $code])->one();

        if ($language === null) {
            throw new \InvalidArgumentException('Не найден язык, с кодом ' . $code);
        }

        return $language->id;
    }

    public static function getCurrent()
    {
        if (self::$current === null) {
            self::$current = self::getDefaultLang();
        }
        return self::$current;
    }


    public static function setCurrent($code = null)
    {
        $language = self::getLangByCode($code);
        self::$current = ($language === null) ? self::getDefaultLang() : $language;
        Yii::$app->language = self::$current->locale;

    }


    public static function getDefaultLang()
    {
        return Yii::$app->db->cache(function () {
            return Languages::find()->where(['id' => 1])->one();
        }, 3600);
    }

    public static function getLangByCode($code = null)
    {
        if ($code === null) {
            return null;
        } else {
            $language = Languages::find()->where(['code' => $code])->one();

            if ($language === null) {
                return null;
            } else {
                return $language;
            }
        }
    }

    public static function getAdminCurrent()
    {
        if (empty(self::$adminCurrent)) {
            $langId = Yii::$app->getSession()->get('admin-language', 1);

            self::$adminCurrent = Languages::findOne($langId);

        }

        return self::$adminCurrent;
    }

}
