<?php

namespace app\controllers;

use Yii;
use app\models\Whatsapp;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WhatsappController implements the CRUD actions for Whatsapp model.
 */
class WhatsappController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Whatsapp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Whatsapp::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Whatsapp model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Whatsapp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Whatsapp();

        //print_r($_SESSION['main_user']['User_id']);

       /* print_r($_POST);
        print_r($_FILES);*/
        if ($_POST) {
          
            $type=Yii::$app->request->get('type');    
            $model->what_user_id=$_SESSION['main_user']['User_id'];
            if($type=="Filter"){ $type="Filtering"; }
            $model->what_type=$type;
          
            $model->what_camp_num_type=$_POST['uploadNumbers'];

            
            if ($type=="Message"||$type=="Media"){
                if ($_POST['CampStart']=="CampStartNow") {
                    $model->what_camp_start_datetime=date('Y-m-d h:i:s');
                }elseif ($_POST['CampStart']=="CampSchedule") {
                    $model->what_camp_start_datetime=date('Y-m-d h:i:s',strtotime($_POST['ScheduleDate'])); 
                }
            }

            if ($_POST['uploadNumbers']=="Numbers") {
                    $model->what_list_number=$_POST['WhatsappNumberList'];
            }elseif ($_POST['uploadNumbers']=="File") {
                    if(isset($_FILES['WhatsappNumberFile']['name']))
                    {
                        $file=$_FILES['WhatsappNumberFile']['tmp_name']; 
                        $newloc="user_files/number_list/".$_SESSION['main_user']['User_id']."_".date('Y_m_d_h_i_s')."_".$_FILES['WhatsappNumberFile']['name'];
                        if(move_uploaded_file($file,$newloc))
                        {
                            $model->what_list_file_path=$newloc;
                        }
                    }
            }
            

            if ($type=="Message"){
           
                $model->what_text=$_POST['MessageText'];

                
            }elseif ($type=="Media") {

                if(isset($_FILES['WhatsappMediaFile']['name']))
                {
                        $file=$_FILES['WhatsappMediaFile']['tmp_name']; 
                        $newloc="user_files/MediaFile/".$_POST['WhatsappMediaType']."/".$_SESSION['main_user']['User_id']."_".date('Y_m_d_h_i_s')."_".$_FILES['WhatsappNumberFile']['name'];
                        if(move_uploaded_file($file,$newloc))
                        {
                            $model->what_media_file_path=$newloc;
                        }
                }



                $model->what_media_type=$_POST['WhatsappMediaType'];
                $model->what_caption=$_POST['MediaCaption'];
            }
        
        }
    

        if ($_POST && $model->save()) {
            return $this->redirect(['view', 'id' => $model->what_id]);
        } else {

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Whatsapp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->what_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Whatsapp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Whatsapp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Whatsapp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Whatsapp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}