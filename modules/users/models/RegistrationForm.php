<?php
/**
 * Created by PhpStorm.
 * User: evgeniy
 * Date: 7/24/14
 * Time: 13:49
 */

namespace app\modules\users\models;


use yii\base\Model;

class RegistrationForm extends Model
{
    public $username;
    public $password;
    public $confirmPassword;
    public $email;
    public $phone;

    public function rules()
    {
        return [
            [['email'], 'unique', 'targetClass' => 'app\modules\users\models\Users', 'targetAttribute' => ['email']],
            [['username'], 'unique', 'targetClass' => 'app\modules\users\models\Users', 'targetAttribute' => ['username']],
            [['username', 'password', 'confirmPassword', 'email'], 'required'],
            [['email'], 'email'],
            [['phone'], 'safe'],
            [['confirmPassword'], 'compare', 'compareAttribute' => 'password']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => \Yii::t('users', 'Имя пользователя'),
            'password' => \Yii::t('users', 'Пароль'),
            'confirmPassword' => \Yii::t('users', 'Потверждение пароля'),
            'email' => \Yii::t('users', 'E-mail адрес'),
            'phone' => \Yii::t('users', 'Телефон'),
        ];
    }

    public function registration()
    {
        if ($this->validate()) {
            $model = new Users();
            $model->setPassword($this->password);
            $model->username = $this->username;
            $model->email = $this->email;
            $model->role = Users::ROLE_USER;
            $model->phone = $this->phone;
            $model->is_active = 1;
            $model->is_from_social = 0;
            $model->is_finish_registration = 1;

            if ($model->save()) {
                return true;
            }
        }

        return false;
    }
}
