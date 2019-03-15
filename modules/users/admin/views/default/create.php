<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\users\models\Users */

$this->title = Yii::t('users', 'Создание пользователя', [
    'modelClass' => 'Пользователи',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Пользователи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">
    <div class="page-heading">

        <h1><i class="icon icon-user-add"></i> <?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
