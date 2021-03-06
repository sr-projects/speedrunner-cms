<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Signup');
$this->params['breadcrumbs'][] = ['label' => $this->title];

?>

<?= $this->title ?>

<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'email')->textInput() ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'confirm_password')->passwordInput() ?>
    
    <?= $form->field($model, 'full_name')->textInput() ?>
    <?= $form->field($model, 'phone')->textInput() ?>
    
    <?= Html::submitButton(Yii::t('app', 'Signup'), ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
