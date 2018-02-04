<?php

namespace app\models;

use Yii;
use app\models\User_credit;
/**
 * This is the model class for table "nishi_user".
 *
 * @property integer $user_id
 * @property string $user_type
 * @property string $user_name
 * @property string $user_password
 * @property string $user_client_name
 * @property string $user_company
 * @property string $user_email
 * @property integer $user_mobile
 * @property string $user_acc_type
 * @property integer $user_service_details_id
 * @property string $user_created_at
 * @property string $user_updated_at
 */
class Portal_user extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nishi_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'user_name', 'user_password', 'user_client_name', 'user_email', 'user_mobile', 'user_acc_type'], 'required'],
            [['user_mobile', 'user_service_details_id'], 'integer'],
            [['user_type', 'user_acc_type'], 'string'],
            [['user_created_at', 'user_updated_at'], 'safe'],
            [['user_name', 'user_password', 'user_company', 'user_email'], 'string', 'max' => 300],
            [['user_client_name'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_type' => 'Type',
            'user_name' => 'User Name',
            'user_password' => 'Password',
            'user_client_name' => 'Client Name',
            'user_company' => 'Company',
            'user_email' => 'Email Address',
            'user_mobile' => 'Mobile Number',
            'user_acc_type' => 'Acc Type',
            'user_service_details_id' => 'User Service Details ID',
            'user_created_at' => 'User Created At',
            'user_updated_at' => 'User Updated At',
        ];
    }

    public function insertInitialCreadit($id)
    {
        $values = array();

        if(isset($_POST['WhatsappCreadit'])&&$_POST['WhatsappCreadit']!=""){

            array_push($values,array('Creadit'=>$_POST['WhatsappCreadit'],'Type'=>"Whatsapp"));

        }
        if (isset($_POST['FilterCredit'])&&$_POST['FilterCredit']!="") {
        
            array_push($values,array('Creadit'=>$_POST['FilterCredit'],'Type'=>"Filter"));

        }

        for ($i=0; $i < count($values) ; $i++){
            $model_Creadit = new User_credit;
            $model_Creadit->credit_user_id = $id;
            $model_Creadit->credit_amount = $values[$i]['Creadit'];
            $model_Creadit->credit_service = $values[$i]['Type'];
            $model_Creadit->save();


        $transaction= new Transaction_log;
        $transaction->trans_user_id=$id;
        $transaction->trans_service=$values[$i]['Type'];
        $transaction->trans_action="Add";
        $transaction->trans_old_creadit=0;
        $transaction->trans_trans_creadit=$values[$i]['Creadit'];
        $transaction->trans_new_creadit=$values[$i]['Creadit'];
        $transaction->trans_tansaction_by=$_SESSION['main_user']['User_id'];
        $transaction->save();
        }

    }
}
