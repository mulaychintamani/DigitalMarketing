<?php

namespace app\controllers;

use Yii;
use app\models\User_credit;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Portal_user;
use app\models\Transaction_log;

/**
 * UsercreditController implements the CRUD actions for User_credit model.
 */
class UsercreditController extends Controller
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
     * Lists all User_credit models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User_credit::find(),
        ]);
        
       
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User_credit model.
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
     * Creates a new User_credit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User_credit();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->credit_id]);
        } else {

            $dataProviderUser = Portal_user::find()->where(['user_type' => "User"])->all();

            $dataProviderReseller = Portal_user::find()->where(['user_type' => "Reseller"])->all();

            return $this->render('create', [
                'model' => $model,
                 'dataProviderUser' => $dataProviderUser,
                 'dataProviderReseller' => $dataProviderReseller,
            ]);
        }
    }

    /**
     * Updates an existing User_credit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->credit_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User_credit model.
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
     * Finds the User_credit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User_credit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User_credit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Deletes an existing User_credit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionGetusers()
    {
        //print_r($_GET['user_id']);
       $responce=User_credit::find()->where(['credit_user_id' => $_GET['user_id']])->all();
      // print_r($responce);

       $Creditt = array();
       for ($i=0; $i < count($responce) ; $i++) { 
            
            $Creditt[$responce[$i]->credit_service] = $responce[$i]->credit_amount;
       }
        if(count($Creditt)>0)
            return json_encode($Creditt);
        else
            return false;
    }

     /**
     * Deletes an existing User_credit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatecredit()
    {
       
        $dataProviderUser = User_credit::find()->where(['credit_user_id' => $_POST['user'],'credit_service' => $_POST['type']])->one();
        if (count($dataProviderUser)>0) {
            $oldCredit=$dataProviderUser->credit_amount;
        }else {
            $oldCredit=0;
        }
        
        $dataProviderUser->credit_amount=$_POST['NewCredit'];
        $dataProviderUser->save();

        if($oldCredit>$_POST['NewCredit']){
            $TrancAction="Remove";
        }else{
            $TrancAction="Add";
        }

        $transaction= new Transaction_log;
        $transaction->trans_user_id=$_POST['user'];
        $transaction->trans_service=$_POST['type'];
        $transaction->trans_action=$TrancAction;
        $transaction->trans_old_creadit=$oldCredit;
        $transaction->trans_trans_creadit=$_POST['ChangeCredit'];
        $transaction->trans_new_creadit=$_POST['NewCredit'];
        $transaction->trans_tansaction_by=$_SESSION['main_user']['User_id'];
        $transaction->save();
        

    }


    


}
