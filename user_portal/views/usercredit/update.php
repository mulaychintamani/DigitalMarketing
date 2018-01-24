<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User_credit */

$this->title = 'Update User Credit: ' . $model->credit_id;
$this->params['breadcrumbs'][] = ['label' => 'User Credits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->credit_id, 'url' => ['view', 'id' => $model->credit_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-credit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
