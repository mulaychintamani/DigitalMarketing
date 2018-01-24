<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User_credit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-credit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'credit_user_id')->textInput() ?>

    <?= $form->field($model, 'credit_amount')->textInput() ?>

    <?= $form->field($model, 'credit_service')->dropDownList([ 'Whatsapp' => 'Whatsapp', 'SMS' => 'SMS', 'Voice Call' => 'Voice Call', 'Filter' => 'Filter', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'credit_created_at')->textInput() ?>

    <?= $form->field($model, 'credit_updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
