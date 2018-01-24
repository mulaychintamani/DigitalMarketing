<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Portal_user */

$this->title = 'Create Portal User';
$this->params['breadcrumbs'][] = ['label' => 'Portal Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
