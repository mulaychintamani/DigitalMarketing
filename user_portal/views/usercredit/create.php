<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User_credit */

$this->title = 'Create User Credit';
$this->params['breadcrumbs'][] = ['label' => 'User Credits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-credit-create">

 
    <h3 class="text-center"><?= Html::encode($this->title) ?></h3>
    <hr>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
