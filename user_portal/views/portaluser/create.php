<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Portal_user */

$userType=Yii::$app->request->get('type');
$this->title = 'Create '. $userType;
$this->params['breadcrumbs'][] = ['label' => 'Portal Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

    
    if($userType!==""){ 
        $model->user_type=$userType;
    } 
?>
<div class="portal-user-create">

    <h3 class="text-center"><?= Html::encode($this->title) ?></h3>
    <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
