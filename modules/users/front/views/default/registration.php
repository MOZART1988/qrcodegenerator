<div class="row">
    <div class="col-md-12">
        <?php $form = \yii\widgets\ActiveForm::begin([]); ?>
        <?= $form->field($model, 'username')->textInput(); ?>
        <?= $form->field($model, 'password')->passwordInput(); ?>
        <?= $form->field($model, 'confirmPassword')->passwordInput(); ?>
        <?= $form->field($model, 'email')->textInput(); ?>
        <?= $form->field($model, 'phone')->textInput(); ?>
        <?= \yii\helpers\Html::submitInput('Зарегистрироваться', ['class' => 'btn btn-success']) ?>

        <?php \yii\widgets\ActiveForm::end(); ?>

        <h2>Войти через соц. сети:</h2>
        <?php echo \nodge\eauth\Widget::widget(array('action' => '/users/login')); ?>
    </div>
</div>
