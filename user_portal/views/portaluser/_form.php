<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Portal_user */
/* @var $form yii\widgets\ActiveForm */
   

?>

<div class="col-sm-6 col-sm-offset-3">
<div class="portal-user-form">

    <?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-4',
            'offset' => 'col-sm-offset-4',
            'wrapper' => 'col-sm-8',
            'error' => '',
            'hint' => '',
        ],
    ],
]); ?>
<!-- 
    <?=  $form->field($model, 'user_id')->textInput() ?> -->

    <?= $form->field($model, 'user_type')->dropDownList([ 'Admin' => 'Admin', 'Reseller' => 'Reseller', 'User' => 'User', ], ['prompt' => '',"disabled"=>"disabled"]) ?>
    <?php //echo $form->field($model, 'user_type')->hiddenInput(['value'=> $value])->label(false);?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_client_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_mobile')->textInput() ?>

    <?= $form->field($model, 'user_acc_type')->dropDownList([ 'Demo' => 'Demo', 'Active' => 'Active', ], ['prompt' => '']) ?>

    <?php //$form->field($model, 'user_service_details_id')->textInput() ?>

    <?php //$form->field($model, 'user_created_at')->textInput() ?>

    <?php //$form->field($model, 'user_updated_at')->textInput() ?>

 </div>
</div>   

<div class="col-sm-8 col-sm-offset-2"> 
    <h4> Add/Remove Credits User </h4>

    <table class="table table-hover">
    <thead>
      <tr>
        <th>Service</th>
        <th>Credits</th>
        <th>Plan</th>
    </tr>
    </thead>
    <tbody>
      <tr>
        <td>Whatsapp</td>
        <td><input type="textInput" class="form-control" name="WhatsappCreadit" ></td>
        <td>
            <select class="form-control">
                <option value="">Select Plan</option>
                <option value="India">India</option>
            </select>
        </td>
       
      </tr>
      <tr>
        <td>Filter</td>
        <td><input type="textInput" class="form-control" name="FilterCredit" ></td>
        <td>
            <select class="form-control">
                <option>Select Plan</option>
                <option value="India">India</option>
            </select>
        </td>
       
      </tr>
      
    </tbody>
  </table>

</div>
<div class="col-sm-12">
    <div class="form-group text-center">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>