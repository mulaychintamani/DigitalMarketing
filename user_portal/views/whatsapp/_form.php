<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Whatsapp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="whatsapp-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php if(Yii::$app->request->get('type')=="Message"){ ?>
    <div class="col-sm-10 col-sm-offset-2 ">
        <div class="col-sm-4 text-muted">Enter Text<br><small>( msg to be sent , 1500 max characters )</small></div>
        <div class="col-sm-5"><textarea class="form-control" rows="3" name="MessageText" id="MessageText"></textarea></div>
    </div>

    <div class="col-sm-12 form-group">
       <div class="col-sm-12 text-center"> &nbsp; </div>
    </div>
    <?php }else if(Yii::$app->request->get('type')=="Media"){?>
    <div class="col-sm-10 col-sm-offset-2">
        <div class="col-sm-4 text-muted">Choose Media Type</small></div>
        <div class="col-sm-5">
            <div class="form-group">
                <label class="radio-inline"><input type="radio" name="WhatsappMediaType" value="Image" checked="checked">Image</label>
                <label class="radio-inline"><input type="radio" name="WhatsappMediaType" value="Audio">Audio</label>
                <label class="radio-inline"><input type="radio" name="WhatsappMediaType" value="Video">Video</label>
                <label class="radio-inline"><input type="radio" name="WhatsappMediaType" value="PDF">PDF</label>
            </div>
        </div>
    </div>


    <div class="col-sm-12 form-group">
       <div class="col-sm-12 text-center"> &nbsp; </div>
    </div>

    <div class="col-sm-10 col-sm-offset-2">
        <div class="col-sm-4 text-muted">Upload Media File</small></div>
        <div class="col-sm-5">
            <div class="input-group">
                <input type="file" name="WhatsappMediaFile" id="WhatsappMediaFile">
            </div>
        </div>
    </div>

      <div class="col-sm-12 form-group">
       <div class="col-sm-12 text-center"> &nbsp; </div>
    </div>

    <div class="col-sm-10 col-sm-offset-2">
        <div class="col-sm-4 text-muted">Caption</div>
        <div class="col-sm-5">
            <div class="">
                <input type="textInput" class="form-control" name="MediaCaption" id="MediaCaption">
            </div>
        </div>
    </div>

    <div class="col-sm-12 form-group">
       <div class="col-sm-12 text-center"> &nbsp; </div>
    </div>

    <?php } ?>


    <div class="col-sm-10 col-sm-offset-2">
        <div class="col-sm-4 text-muted">Campaign Numbers</div>
        <div class="col-sm-5"><div class="form-group">
            <label class="radio-inline"><input type="radio" name="uploadNumbers" value="Numbers" id="Numbers" checked="checked">Numbers</label>
            <label class="radio-inline"><input type="radio" name="uploadNumbers" value="File" id="File">Upload File</label>
        </div></div>
    </div>

    <div class="col-sm-12 form-group">
       <div class="col-sm-12 text-center"> OR </div>
    </div>

    <div class="col-sm-10 col-sm-offset-2" id="NumbersDiv">
        <div class="col-sm-4 text-muted">Enter Numbers<br><small>( one number at each line ,each no. should start with country code,e.g. India - 91XXXXXXXXXX )</small></div>
        <div class="col-sm-5">
            <textarea class="form-control" rows="3" name="WhatsappNumberList" id="WhatsappNumberList"></textarea>
        </div>
    </div>

    <div class="col-sm-12 form-group">
       <div class="col-sm-12 text-center"> &nbsp; </div>
    </div>

    <div class="col-sm-10 col-sm-offset-2 disabledbutton" id="FileDiv">
        <div class="col-sm-4 text-muted">Upload Excel / CSV File</div>
        <div class="col-sm-6">
            <div class="input-group">
                <input type="file" name="WhatsappNumberFile" value="">
            </div>
        </div>
    </div>

    

    <div class="col-sm-12 form-group">
       <div class="col-sm-12 text-center"> &nbsp; </div>
    </div>

    <?php if(Yii::$app->request->get('type')!="Filter"){ ?>

    <div class="col-sm-10 col-sm-offset-2">
        <div class="col-sm-4 text-muted">Campaign Start Date-Time</div>
        <div class="col-sm-5">
            <div class="form-group">
                <label class="radio-inline">
                    <input type="radio" name="CampStart" value="CampStartNow" id="CampStartNow" checked="checked">Start Now
                </label>
                <label class="radio-inline">
                    <input type="radio" name="CampStart" value="CampSchedule" id="CampSchedule">Schedule Campaign
                </label>
            </div>

        </div>
    </div>

    <div class="col-sm-12 form-group">
       <div class="col-sm-12 text-center"> &nbsp; </div>
    </div>

    

    <div class="col-sm-10 col-sm-offset-2 disabledbutton" id="CampScheduleDiv">
        <div class="col-sm-4 text-muted">Campaign Start Date-Time</div>
            <div class="col-sm-5">
                <div class="form-group">
                    <!-- <input type="text" name="ScheduleDate" class="form-control"> -->
                    <?php echo DateTimePicker::widget([
                        'name' => 'ScheduleDate',
                        'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                        'options' => ['placeholder' => 'Select Campaign date'],
                        'convertFormat' => true,
                        'pluginOptions' => [
                            'format' => 'd-M-y h:i:s',
                            'startDate' => '01-Mar-2014 12:00 AM',
                            'todayHighlight' => true
                        ]
                    ]);?>
                </div>

            </div>
    
    </div>
    <?php } ?>

    <script type="text/javascript">
        


    </script>



    <!-- <?= $form->field($model, 'what_user_id')->textInput() ?>

    <?= $form->field($model, 'what_type')->dropDownList([ 'Message' => 'Message', 'Media' => 'Media', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'what_media_type')->dropDownList([ 'Image' => 'Image', 'Audio' => 'Audio', 'Video' => 'Video', 'PDF' => 'PDF', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'what_caption')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'what_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'what_camp_num_type')->dropDownList([ 'Numbers' => 'Numbers', 'File' => 'File', 'List' => 'List', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'what_list_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'what_list_file_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'what_list_list_id')->textInput() ?>

    <?= $form->field($model, 'what_camp_start_datetime')->textInput() ?>

    <?= $form->field($model, 'what_created_at')->textInput() ?>

    <?= $form->field($model, 'what_updated_at')->textInput() ?>
 -->
    <div class="form-group text-center">
        <?= Html::submitButton($model->isNewRecord ? 'Send' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<script type="text/javascript">
    
    $(document).ready(function() {
        $('input[type=radio][name=uploadNumbers]').change(function() {

            if (this.value == 'Numbers') {
               $("#FileDiv").addClass("disabledbutton");
                $("#NumbersDiv").removeClass("disabledbutton");

            }
            else if (this.value == 'File') {
                $("#NumbersDiv").addClass("disabledbutton");
                 $("#FileDiv").removeClass("disabledbutton");
            }
        });

        $('input[type=radio][name=CampStart]').change(function() {

            if (this.value == 'CampStartNow') {
               $("#CampScheduleDiv").addClass("disabledbutton");
               

            }
            else if (this.value == 'CampSchedule') {
               
               $("#CampScheduleDiv").removeClass("disabledbutton");
            }
        });
    });


</script>