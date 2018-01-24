<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Portal_user */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portal-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=  $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'user_type')->dropDownList([ 'Admin' => 'Admin', 'Reseller' => 'Reseller', 'User' => 'User', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_client_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_mobile')->textInput() ?>

    <?= $form->field($model, 'user_acc_type')->dropDownList([ 'Demo' => 'Demo', 'Active' => 'Active', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'user_service_details_id')->textInput() ?>

    <?php //$form->field($model, 'user_created_at')->textInput() ?>

    <?php //$form->field($model, 'user_updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
