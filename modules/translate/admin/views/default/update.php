<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\translate\models\Message */

$this->title = 'Изменение перевода:';
$this->params['breadcrumbs'][] = ['label' => 'Перевод', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'language' => $model->language]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="message-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
