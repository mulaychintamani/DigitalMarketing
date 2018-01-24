<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User_credit */

$this->title = $model->credit_id;
$this->params['breadcrumbs'][] = ['label' => 'User Credits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-credit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->credit_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->credit_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'credit_id',
            'credit_user_id',
            'credit_amount',
            'credit_service',
            'credit_created_at',
            'credit_updated_at',
        ],
    ]) ?>

</div>
