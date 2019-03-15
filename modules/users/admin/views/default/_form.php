<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\users\models\Users */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="users-form">
    <div class="widget">
        <div class="widget-content padding">
            <?php $form = ActiveForm::begin(
                [
                    'enableClientValidation' => ($model->isNewRecord) ? true : false,
                    'options' => ['enctype' => 'multipart/form-data']
                ]); ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>

            <?= $form->field($model, 'newPassword')->passwordInput(['maxlength' => 255]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => 255]) ?>

            <?= $form->field($model, 'last_name')->textInput(['maxlength' => 255]) ?>
            <?= $form->field($model, 'role')->dropDownList(\app\modules\users\models\Users::$roles,
                ['prompt' => 'Выберите роль пользователя']) ?>

            <?= $form->field($model, 'qrcode')->textInput(['disable' => true])?>

            <?= $form->field($model, 'is_active')->checkbox() ?>

            <div class="form-group">
                <?= Html::submitButton(
                    $model->isNewRecord ? Yii::t('users', 'Создать') : Yii::t('users', 'Сохранить'),
                    ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
                ) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
