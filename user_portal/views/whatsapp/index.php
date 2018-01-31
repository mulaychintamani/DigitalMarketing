<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Whatsapps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="whatsapp-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Whatsapp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'what_id',
            'what_user_id',
            'what_type',
            'what_media_type',
            'what_caption',
            // 'what_text',
            // 'what_camp_num_type',
            // 'what_list_number',
            // 'what_list_file_path',
            // 'what_list_list_id',
            // 'what_camp_start_datetime',
            // 'what_created_at',
            // 'what_updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
