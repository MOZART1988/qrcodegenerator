<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \app\modules\custom_variables\models\CustomVariables */
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

            <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

            <?= $form->field($model, 'type_id')->dropDownList(\app\modules\custom_variables\models\CustomVariables::$types)?>

            <?= $form->field($model, 'value')->textarea() ?>

            <?= $form->field($model, 'module_name')->dropDownList(\app\modules\custom_variables\models\CustomVariables::getModulesDropDownList()) ?>

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
