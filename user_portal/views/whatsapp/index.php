<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Whatsapps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="whatsapp-index" style="min-height: 80vh;">

    <h3><?php //Html::encode($this->title) ?>Campaign Report</h3>
    <hr>
<!-- 
    <p>
        <?php // Html::a('Create Whatsapp', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->


    <?php //print_r($responce); ?>

     <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Whatsapp</a></li>
  <li><a data-toggle="tab" href="#menu1">Media</a></li>
   <!-- <li><a data-toggle="tab" href="#menu2">Filter</a></li> -->
  
</ul>

<div class="col-sm-10 col-sm-offset-1">

        <div class="tab-content" style="">
              <div id="home" class="tab-pane fade in active">
                     <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Service Type</th>
                            <th>Text</th>
                            <th>Numbers List</th>
                            <th>Transaction Credit</th>
                            <th>New Credit</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php for ($i=0; $i < count($responce) ; $i++) { 
                            if($responce[$i]->what_type=="Message"){
                        ?> 
                          <tr>
                            <td><?= $responce[$i]->what_type; ?></td>
                            <td><?= $responce[$i]->what_text; ?></td>
                            <td><?= $responce[$i]->what_list_number; ?></td> <!-- or File path what_list_file_path -->
                            <td><?= $responce[$i]->what_caption; ?></td>
                            <td><?= $responce[$i]->what_camp_start_datetime; ?></td>
                          </tr>
                         <?php  } } ?>
                        </tbody>
                      </table>
              </div>
              <div id="menu1" class="tab-pane fade">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Service Type</th>
                            <th>Media Type</th>
                            <th>Numbers</th>
                            <th>Caption</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php for ($i=0; $i < count($responce) ; $i++) { 
                            if($responce[$i]->what_type=="Media"){
                        ?> 
                          <tr>
                            <td><?= $responce[$i]->what_type; ?></td>
                            <td><?= $responce[$i]->what_media_type; ?></td>
                            <td><?= $responce[$i]->what_list_number; ?></td> <!-- or File path what_list_file_path -->
                            <td><?= $responce[$i]->what_caption; ?></td>
                            <td><?= $responce[$i]->what_camp_status; ?></td>
                          </tr>
                         <?php  } } ?>
                        </tbody>
                      </table>
              </div>
               <!-- <div id="menu2" class="tab-pane fade">
                  
              </div>
   -->
        </div>
</div>


    <?php /* GridView::widget([
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
    ]);*/ ?>
</div>
