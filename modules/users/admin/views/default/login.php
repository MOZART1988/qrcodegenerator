<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\modules\users\models\LoginForm */

$this->title = 'Вход в панель управления'; ?>

<div class="container">
    <div class="col-lg-6">
        <div class="login-wrapper">
            <h3> <?= $this->title ?> </h3>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'username', [
                'options' => ['class' => 'form-group login-input'],
                'inputOptions' => ['class' => 'form-control text-input', 'placeholder' => 'Имя пользователя'],
                'template' => "{label}\n{input}\n{hint}\n{error}"
            ])->label(false) ?>
            <?= $form->field($model, 'password', [
                'template' => "{label}\n{input}\n{hint}\n{error}",
                'options' => ['class' => 'form-group login-input'],
                'inputOptions' => ['class' => 'form-control text-input', 'placeholder' => '**********']
            ])->label(false)->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-success btn-block">Войти</button>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

