<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\translate\models\Message */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php if (!$model->isNewRecord) { ?>
        <h5>Исходная фраза</h5>

        <div class="well">
            <?= Html::encode($model->source->message) ?>
        </div>
    <?php } ?>

    <?= $form->field($model, 'language')->dropDownList(\app\modules\languages\models\Languages::getDropdownList('title', 'locale')) ?>

    <?= $form->field($model, 'translation')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
