<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaction Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-log-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <hr>

   <!--  <p>
        <?= Html::a('Create Transaction Log', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'trans_id',
            'trans_user_id',
            'trans_service',
            'trans_action',
            'trans_old_creadit',
             'trans_trans_creadit',
             'trans_new_creadit',
             'trans_tansaction_by',
            // 'trans_created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
