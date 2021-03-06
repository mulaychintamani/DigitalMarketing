<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All '.Yii::$app->request->get('type');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-user-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <hr>

    <!-- <p>
        <?= Html::a('Create Portal User', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'user_type',
            'user_name',
            'user_password',
            'user_client_name',
             'user_company',
            // 'user_email:email',
             'user_mobile',
            // 'user_acc_type',
            // 'user_service_details_id',
            // 'user_created_at',
            // 'user_updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
