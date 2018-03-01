<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$type=Yii::$app->request->get('type'); 
$this->title = 'Whatsapps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="whatsapp-index" style="min-height: 80vh;">

    <h3><?php //Html::encode($this->title) ?>Campaign Report</h3>
    <hr>



<div style="<?php if($type=="whatsapp"){  }else{ echo "display:none;"; } ?>">
    <div class="col-sm-10 col-sm-offset-1">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Whatsapp</a></li>
       <!--  <li><a data-toggle="tab" href="#menu1">Media</a></li> -->
         <!-- <li><a data-toggle="tab" href="#menu2">Filter</a></li> -->
      </ul>
    </div>
    <div class="col-sm-10 col-sm-offset-1">

            <div class="tab-content" style="">
                  <div id="home" class="tab-pane fade in active">
                         <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>C. ID</th>
                                <th>Content</th>
                                <th>Media Type</th>
                                <th>Total Numbers</th>
                                <th>Status</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                              </tr>
                            </thead>
                            <tbody>
                             <?php for ($i=0; $i < count($responce) ; $i++) { 
                                if($responce[$i]->what_type!="Filtering"){
                            ?> 
                              <tr>
                                <td><?= $responce[$i]->what_id; ?></td>
                                <td><textarea class="form-control" disabled style="resize: none;"><?= $responce[$i]->what_text; ?></textarea></td>
                                <td><a href="<?= $responce[$i]->what_media_file_path; ?>" target="_blank" ><?= $responce[$i]->what_media_type; ?></a></td> <!-- or File path what_list_file_path -->
                                <td><?= $responce[$i]->what_total_numbers; ?></td>
                                <td><?= $responce[$i]->what_camp_status; ?></td>
                                <td><?= $responce[$i]->what_camp_start_datetime; ?></td>
                                <td><?= $responce[$i]->what_updated_at; ?></td>
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
</div>

<div style="<?php if($type=="Filter"){}else{ echo "display: none;"; } ?>">
  <div class="col-sm-10 col-sm-offset-1">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#homeFilter">Filter</a></li>
       
      </ul>
    </div>
    <div class="col-sm-10 col-sm-offset-1">

            <div class="tab-content" style="">
                  <div id="homeFilter" class="tab-pane fade in active">
                         <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>C.ID</th>
                                <th>Number File</th>
                                <th>Total Nos</th>
                                <th>Status</th>
                                <th>End Time</th>
                                <th>Filtered nos File</th>
                               
                              </tr>
                            </thead>
                            <tbody>
                             <?php for ($i=0; $i < count($responce) ; $i++) { 
                                if($responce[$i]->what_type=="Filtering"){
                            ?> 
                              <tr>
                                <td><?= $responce[$i]->what_id; ?></td>
                                <td><a href="<?= $responce[$i]->what_list_file_path?>">Download</a></td>
                                <td><?= $responce[$i]->what_total_numbers; ?></td> <!-- or File path what_list_file_path -->
                                <td><?= $responce[$i]->what_camp_status; ?></td>
                                <td><?= $responce[$i]->what_updated_at; ?></td>
                                <td><?= $responce[$i]->what_list_filter_no_file_path; ?></td>
                               
                              </tr>
                             <?php  } } ?>
                            </tbody>
                          </table>
                  </div>
                 
            </div>
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
