<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Whatsapp */

$this->title = $model->what_id;
$this->params['breadcrumbs'][] = ['label' => 'Whatsapps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="whatsapp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->what_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->what_id], [
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
            'what_id',
            'what_user_id',
            'what_type',
            'what_media_type',
            'what_caption',
            'what_text',
            'what_camp_num_type',
            'what_list_number',
            'what_list_file_path',
            'what_list_list_id',
            'what_camp_start_datetime',
            'what_created_at',
            'what_updated_at',
        ],
    ]) ?>

</div>
