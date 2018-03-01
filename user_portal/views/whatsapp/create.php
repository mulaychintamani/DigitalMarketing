<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Whatsapp */

$this->title = 'Whatsapp '.Yii::$app->request->get('type');
$this->params['breadcrumbs'][] = ['label' => 'Whatsapps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="whatsapp-create" style="min-height: 80vh;">

    <h3 ><?= Html::encode($this->title) ?></h3>
    <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
