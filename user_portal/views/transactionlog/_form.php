<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Transaction_log */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-sm-10 col-sm-offset-1"> 
<div class="transaction-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'trans_user_id')->textInput() ?>

    <?= $form->field($model, 'trans_service')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trans_action')->dropDownList([ 'Add' => 'Add', 'Remove' => 'Remove', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'trans_old_creadit')->textInput() ?>

    <?= $form->field($model, 'trans_trans_creadit')->textInput() ?>

    <?= $form->field($model, 'trans_new_creadit')->textInput() ?>

    <?= $form->field($model, 'trans_tansaction_by')->textInput() ?>

    <?= $form->field($model, 'trans_created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
