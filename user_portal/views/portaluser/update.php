<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Portal_user */

$this->title = 'Update Portal User: ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Portal Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portal-user-update">

    <h3><?= Html::encode(ucfirst($model->user_name)) ?></h3>
    <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
