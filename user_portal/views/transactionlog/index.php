<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaction Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-log-index" style="min-height: 90vh;">

    <h3><?= Html::encode($this->title) ?></h3>
    <hr>

   <!--  <p>
        <?= Html::a('Create Transaction Log', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
     <?php  //print_r($responce);?>
     <?php if($_SESSION['main_user']['user_type']=="User"){ $disaplay="";}else{$disaplay="display:none;";}?>



  <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Whatsapp</a></li>
  <li><a data-toggle="tab" href="#menu1">Filter</a></li>
  
</ul>

<div class="tab-content" style="<?= $disaplay ?>">
  <div id="home" class="tab-pane fade in active">
            <table class="table table-striped">
            <thead>
              <tr>
                <th>Service</th>
                <th>Action</th>
                <th>Old Credit</th>
                <th>Transaction Credit</th>
                <th>New Credit</th>
                <th>Transaction By</th>
              </tr>
            </thead>
            <tbody>
             <?php for ($i=0; $i < count($responce) ; $i++) { 
                if($responce[$i]->trans_service=="Whatsapp"){
            ?> 
              <tr>
                <td><?= $responce[$i]->trans_service; ?></td>
                <td><?= $responce[$i]->trans_action; ?></td>
                <td><?= $responce[$i]->trans_old_creadit; ?></td>
                <td><?= $responce[$i]->trans_trans_creadit; ?></td>
                <td><?= $responce[$i]->trans_new_creadit; ?></td>
                <td><?= $responce[$i]->trans_tansaction_by; ?></td>
              </tr>
             <?php  } } ?>
            </tbody>
          </table>
  </div>
  <div id="menu1" class="tab-pane fade">
        <table class="table table-striped">
        <thead>
          <tr>
            <th>Service</th>
            <th>Action</th>
            <th>Old Credit</th>
            <th>Transaction Credit</th>
            <th>New Credit</th>
            <th>Transaction By</th>
          </tr>
        </thead>
        <tbody>
         <?php for ($i=0; $i < count($responce) ; $i++) { 
            if($responce[$i]->trans_service=="Filter"){
        ?> 
          <tr>
            <td><?= $responce[$i]->trans_service; ?></td>
            <td><?= $responce[$i]->trans_action; ?></td>
            <td><?= $responce[$i]->trans_old_creadit; ?></td>
            <td><?= $responce[$i]->trans_trans_creadit; ?></td>
            <td><?= $responce[$i]->trans_new_creadit; ?></td>
            <td><?= $responce[$i]->trans_tansaction_by; ?></td>
          </tr>
         <?php  } } ?>
        </tbody>
      </table>
  </div>
  
</div>


   




    <?php /* GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'trans_id',
            'trans_user_id',
            'trans_service',
            'trans_action',
            'trans_old_creadit',
             'trans_trans_creadit',
             'trans_new_creadit',
             'trans_tansaction_by',
            // 'trans_created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */ ?>
</div>
