<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Whatsapp */

$this->title = 'Update Whatsapp: ' . $model->what_id;
$this->params['breadcrumbs'][] = ['label' => 'Whatsapps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->what_id, 'url' => ['view', 'id' => $model->what_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="whatsapp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
