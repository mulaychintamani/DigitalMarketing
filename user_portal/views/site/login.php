<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-sm-12">
    <div class="col-sm-6 backgroundimage" style="background-color:#FFFFFF; margin-top: 3%; height: 80vh;">
        &nbsp;
    </div>


    <div class="col-sm-6" style="background-color:#FFFFFF; margin-top: 3%;  height: 80vh;">
        <div style="margin-top: 20%;">
            <div class="site-login" >
                <div class="col-sm-12"> <h2>Digital Marketing <small>LOGIN</small></h2>
                    <hr>
                    <!--   <p>Please fill out the following fields to login:</p> -->

                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'horizontal',
                        'fieldConfig' => [
                            'template' => "<div class=\"col-sm-10 \">{input}</div>\n<div class=\"col-lg-5 \">{error}</div>",
                            'labelOptions' => ['class' => 'col-sm-2 control-label'],
                        ],
                    ]); ?>
                    
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>"User Name"]) ?>
                    
                    <?= $form->field($model, 'password')->passwordInput(['autofocus' => true,'placeholder'=>"Password"]) ?>

                    <!-- <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    ]) ?> -->
                    <hr>
                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>

                   <!--  <div class="col-lg-offset-1" style="color:#999;">
                        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
                        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
                    </div> -->
                </div>
        </div>
    </div>
   
</div>