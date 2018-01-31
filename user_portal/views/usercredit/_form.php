<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User_credit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-sm-8 col-sm-offset-2">

<div class="user-credit-form">

    <!-- <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'credit_user_id')->textInput() ?>

    <?= $form->field($model, 'credit_amount')->textInput() ?>

    <?= $form->field($model, 'credit_service')->dropDownList([ 'Whatsapp' => 'Whatsapp', 'SMS' => 'SMS', 'Voice Call' => 'Voice Call', 'Filter' => 'Filter', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'credit_created_at')->textInput() ?>

    <?= $form->field($model, 'credit_updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div> -->
<h4> Add/Remove Credits User </h4>
    <select class="form-control" id="getUserList">
        <option>Select User</option>
        <option>User1</option>
        <option>User2</option>
    </select>
    <table class="table table-hover">
    <thead>
      <tr>
        <th>Service</th>
        <th>Available Credits</th>
        <th>Action Credits</th>
        <th>Action Credits</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Whatsapp</td>
        <td><input type="textInput" class="form-control" name="" disabled></td>
        <td><input type="textInput" class="form-control"  name=""></td>
        <td>
            <button type="button" class="btn btn-success">+</button>
            <button type="button" class="btn btn-danger">-</button>
            <button type="button" class="btn btn-primary">&#10003;</button>
        </td>
      </tr>
      <tr>
        <td>Filter</td>
        <td><input type="textInput" class="form-control" name="" disabled></td>
        <td><input type="textInput" class="form-control" name=""></td>
        <td>
            <button type="button" class="btn btn-success">+</button>
            <button type="button" class="btn btn-danger">-</button>
            <button type="button" class="btn btn-primary">&#10003;</button>
        </td>
      </tr>
      
    </tbody>
  </table>
<hr>
<h4> Add/Remove Credits Reseller </h4>
<hr>
   <select class="form-control">
        <option>Select User</option>
        <option>User1</option>
        <option>User2</option>
    </select>
    <table class="table table-hover">
    <thead>
      <tr>
        <th>Service</th>
        <th>Available Credits</th>
        <th>Action Credits</th>
        <th>Action Credits</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Whatsapp</td>
        <td><input type="textInput" class=form-control " name="" disabled></td>
        <td><input type="textInput" class="form-control"  name=""></td>
         <td>
            <button type="button" class="btn btn-success">+</button>
            <button type="button" class="btn btn-danger">-</button>
            <button type="button" class="btn btn-primary">&#10003;</button>
        </td>
      </tr>
      <tr>
        <td>Filter</td>
        <td><input type="textInput" class="form-control disabled" name="" disabled></td>
        <td><input type="textInput" class="form-control" name=""></td>
        <td>
            <button type="button" class="btn btn-success">+</button>
            <button type="button" class="btn btn-danger">-</button>
            <button type="button" class="btn btn-primary">&#10003;</button>
        </td>
      </tr>
      
    </tbody>
  </table>

 
    <?php ActiveForm::end(); ?>

</div>

</div>

<script type="text/javascript">
   //$("#getUserList").click(function(){  
         /*$.get("/index.php?r=usercredit/getusers&type=User", function(data, status){
            alert("Data: " + data + "\nStatus: " + status);
        });*/
    //}); 
</script>