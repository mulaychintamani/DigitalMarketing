<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Portal_user */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Portal Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->user_id], [
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
            'user_id',
            'user_type',
            'user_name',
            'user_password',
            'user_client_name',
            'user_company',
            'user_email:email',
            'user_mobile',
            'user_acc_type',
            'user_service_details_id',
            'user_created_at',
            'user_updated_at',
        ],
    ]) ?>

</div>
