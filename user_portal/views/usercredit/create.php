<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User_credit */

$this->title = 'Create User Credit';
$this->params['breadcrumbs'][] = ['label' => 'User Credits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-credit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
