<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Transaction_log */

$this->title = $model->trans_id;
$this->params['breadcrumbs'][] = ['label' => 'Transaction Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-log-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->trans_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->trans_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<div class="col-sm-10 col-sm-offset-1"> 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'trans_id',
            'trans_user_id',
            'trans_service',
            'trans_action',
            'trans_old_creadit',
            'trans_trans_creadit',
            'trans_new_creadit',
            'trans_tansaction_by',
            'trans_created_at',
        ],
    ]) ?>
</div>


</div>
