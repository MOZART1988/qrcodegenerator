<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model \app\modules\custom_variables\models\CustomVariables */

$this->title = Yii::t('users', 'Создание переменной', [
    'modelClass' => 'Переменные',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Переменные'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">
    <div class="page-heading">
        <h1> <?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
