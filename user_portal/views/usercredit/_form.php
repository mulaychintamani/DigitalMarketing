<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User_credit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-sm-8 col-sm-offset-2">

<div class="user-credit-form">
<?php // print_r($_SESSION); exit(); ?>
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
        <option value="">Select User Name</option>
        <?php
          for ($i=0; $i < count($dataProviderUser) ; $i++) { 
           echo "<option value=".$dataProviderUser[$i]->user_id.">".ucfirst($dataProviderUser[$i]->user_name)."</option>";
          }
        ?>
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
        <td><input type="textInput" class="form-control" name="CurrentWhatsappCreditUser" id="CurrentWhatsappCreditUser" disabled></td>
        <td><input type="textInput" class="form-control"  name="ActionWhatsappCreditUser" id="ActionWhatsappCreditUser"></td>
        <td>
            <button type="button" class="btn btn-success" onclick="addRemoveCreditUI('Add','CurrentWhatsappCreditUser','ActionWhatsappCreditUser','User');">+</button>
            <button type="button" class="btn btn-danger" onclick="addRemoveCreditUI('Remove','CurrentWhatsappCreditUser','ActionWhatsappCreditUser','User');">-</button>
            <button type="button" class="btn btn-primary" onclick="UpdateCredit('CurrentWhatsappCreditUser','ActionWhatsappCreditUser','Whatsapp','User');">&#10003;</button>
        </td>
      </tr>
      <tr>
        <td>Filter</td>
        <td><input type="textInput" class="form-control" name="CurrentFilterCreditUser" id="CurrentFilterCreditUser" disabled></td>
        <td><input type="textInput" class="form-control" name="ActionCreditFilterUser" id="ActionCreditFilterUser"></td>
        <td>
            <button type="button" class="btn btn-success" onclick="addRemoveCreditUI('Add','CurrentFilterCreditUser','ActionCreditFilterUser','User');">+</button>
            <button type="button" class="btn btn-danger " onclick="addRemoveCreditUI('Remove','CurrentFilterCreditUser','ActionCreditFilterUser','User');">-</button>
            <button type="button" class="btn btn-primary" onclick="UpdateCredit('CurrentFilterCreditUser','ActionCreditFilterUser','Filter','User');">&#10003;</button>
        </td>
      </tr>
      
    </tbody>
  </table>
<hr>
<h4> Add/Remove Credits Reseller </h4>
<hr>
   <select class="form-control" id="getResellerList"> <!-- dataProviderReseller -->
        <option value="">Select Reseller Name</option>
        <?php
          for ($i=0; $i < count($dataProviderReseller) ; $i++) { 
           echo "<option value=".$dataProviderReseller[$i]->user_id.">".ucfirst($dataProviderReseller[$i]->user_name)."</option>";
          }
        ?>
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
        <td><input type="textInput" class=form-control " name="CurrentWhatsappCredit" id="CurrentWhatsappCredit" disabled></td>
        <td><input type="textInput" class="form-control"  name="ActionCreditWhatsappReseller" id="ActionCreditWhatsappReseller"></td>
         <td>
            <button type="button" class="btn btn-success" id="AddWhatsapp" onclick="addRemoveCreditUI('Add','CurrentWhatsappCredit','ActionCreditWhatsappReseller','Reseller');">+</button>
 <button type="button" class="btn btn-danger" id="RemoveWhtaspp" onclick="addRemoveCreditUI('Remove','CurrentWhatsappCredit','ActionCreditWhatsappReseller','Reseller');">-</button>
            <button type="button" class="btn btn-primary" id="SubmitCreditWhatsapp" onclick="UpdateCredit('CurrentWhatsappCredit','ActionCreditWhatsappReseller','Whatsapp','Reseller');">&#10003;</button>
        </td>
      </tr>
      <tr>
        <td>Filter</td>
        <td><input type="textInput" class="form-control disabled" name="CurrentFilterCredit" id="CurrentFilterCredit" disabled></td>
        <td><input type="textInput" class="form-control" name="ActionCreditFilterReseller" id="ActionCreditFilterReseller"></td>
        <td>
            <button type="button" class="btn btn-success" id="AddFilter" onclick="addRemoveCreditUI('Add','CurrentFilterCredit','ActionCreditFilterReseller','Reseller');">+</button>
            <button type="button" class="btn btn-danger" id="RemoveFilter" onclick="addRemoveCreditUI('Remove','CurrentFilterCredit','ActionCreditFilterReseller','Reseller');">-</button>
            <button type="button" class="btn btn-primary" id="SubmitFilterCredit" onclick="UpdateCredit('CurrentFilterCredit','ActionCreditFilterReseller','Filter','Reseller');">&#10003;</button>
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

$('#getUserList').on('change', function() {
 // alert( this.value );
  $.get("/index.php?r=usercredit/getusers&type=User&user_id="+this.value, function(data, status){
            if(data!=""){
            var obj = JSON.parse(data);
              $("#CurrentWhatsappCreditUser").val(obj.Whatsapp);
              $("#CurrentFilterCreditUser").val(obj.Filter);          

           }else{
           
            $("#CurrentWhatsappCreditUser").val("0");
            $("#CurrentFilterCreditUser").val("0"); 
           }
        });
});

$('#getResellerList').on('change', function() {
 // alert( this.value );
   $.get("/index.php?r=usercredit/getusers&type=Reseller&user_id="+this.value, function(data, status){
           if(data!=""){
            var obj = JSON.parse(data);
              $("#CurrentWhatsappCredit").val(obj.Whatsapp);
              $("#CurrentFilterCredit").val(obj.Filter);          

           }else{
            
            $("#CurrentWhatsappCredit").val("0");
            $("#CurrentFilterCredit").val("0"); 
           }
        });
});


function addRemoveCreditUI(status,id,Actionid,userType){

if (userType=="Reseller") {
   var userID=$('#getResellerList').val();

}else{

  var userID=$('#getUserList').val();
}
  
  if (userID=="") {
    alert("Plase select "+userType+" name to modify credits"); return false;
  } 

    Current=$("#"+id).val();
    Action=$("#"+Actionid).val();

    if (Current==""||Action=="") {
      alert("Please select Action credit for "+userType); return false;
    }

   // alert(Action);
    if(status=="Add"){
      Summary=parseInt(Current)+parseInt(Action);
      $("#"+id).val(Summary);
    }else if(status=="Remove"){
      Summary=parseInt(Current)-parseInt(Action);
      $("#"+id).val(Summary);
    }



}


function UpdateCredit(Current,Action,type,userType){



  if (userType=="User") {
   var userId= $('#getUserList').val();
  }else if(userType=="Reseller"){
   var userId= $('#getResellerList').val();
  }


  Current=$("#"+Current).val();
    Action=$("#"+Action).val();
    if (Current==""||Action=="") {
      alert("Please select "+ type +" Action credit for "+userType); return false;
    }

  $.post("/index.php?r=usercredit/updatecredit",
        {
          NewCredit: Current,
          ChangeCredit: Action,
          user: userId,
          type: type,
         
        },
        function(data,status){
            alert("Data: " + data + "\nStatus: " + status);
        });
}
 /**/
       /*  $.post("/index.php?r=usercredit/getusers&type=User", function(data, status){
            alert("Data: " + data + "\nStatus: " + status);
        });
 */

</script>