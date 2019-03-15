<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\translate\models\Message */

$this->title = 'Создание перевода';
$this->params['breadcrumbs'][] = ['label' => 'Перевод', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
