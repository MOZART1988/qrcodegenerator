<?php
/**
 * Created by PhpStorm.
 * User: MOZART
 * Date: 03.09.2017
 * Time: 21:37
 */

namespace app\modules\custom_variables\models;


use mtemplate\mclasses\ActiveRecord;
use mtemplate\mclasses\LanguageActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * @property integer $id
 * @property integer $type_id
 * @property integer $is_active
 * @property integer $lang_id
 *
 * @property string $imageFile
 * @property string $file
 * @property string $create_date
 * @property string $update_date
 * @property string $value
 * @property string $title
 * @property string $module_name
*/

class CustomVariables extends LanguageActiveRecord
{

    public $imageFile;
    public $file;

    const TYPE_TEXT = 1;
    const TYPE_IMAGE = 2;
    const TYPE_FILE = 3;

    public static $types = [
        self::TYPE_TEXT => 'Текст',
        self::TYPE_IMAGE => 'Картинка',
        self::TYPE_FILE => 'Файл',
    ];

    public static function tableName()
    {
        return 'custom_variables';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'is_active', 'lang_id'], 'integer'],
            [['type_id', 'value', 'title'], 'required'],
            [['value', 'title', 'module_name'], 'string'],
            [['create_date', 'update_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Тип переменной',
            'title' => 'Наименование',
            'value' => 'Содержимое',
            'module_name' => 'Модуль',
            'is_active' => 'Активность',
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

    public static function find()
    {
        $query = new CustomVariablesQuery(get_called_class());

        if (Yii::$app->params['yiiEnd'] === 'admin') {
            return $query->setLanguage();
        }

        return $query;
    }

    public static function getModulesDropDownList()
    {
        $modules = \Yii::$app->modules;
        $result = [];

        foreach ($modules as $module_id => $object) {
          foreach ($object as $class => $name) {
              $result[$module_id] = $name;
          }
        }

        return $result;
    }
}