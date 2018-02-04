<?php

namespace app\models;
use app\models\User_credit;


use Yii;

/**
 * This is the model class for table "nishi_whatsapp".
 *
 * @property integer $what_id
 * @property integer $what_user_id
 * @property string $what_type
 * @property string $what_media_type
 * @property string $what_caption
 * @property string $what_text
 * @property string $what_camp_num_type
 * @property string $what_list_number
 * @property string $what_list_file_path
 * @property integer $what_list_list_id
 * @property string $what_camp_start_datetime
 * @property string $what_created_at
 * @property string $what_updated_at
 */
class Whatsapp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nishi_whatsapp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          //  [['what_user_id', 'what_type', 'what_camp_num_type'], 'required'],
           /* [['what_user_id', 'what_list_list_id'], 'integer'],
            [['what_type', 'what_media_type', 'what_camp_num_type'], 'string'],
            [['what_camp_start_datetime', 'what_created_at', 'what_updated_at'], 'safe'],
            [['what_caption', 'what_list_file_path'], 'string', 'max' => 1000],
            [['what_text', 'what_list_number'], 'string', 'max' => 10000],*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'what_id' => 'What ID',
            'what_user_id' => 'What User ID',
            'what_type' => 'What Type',
            'what_media_type' => 'What Media Type',
            'what_caption' => 'What Caption',
            'what_text' => 'What Text',
            'what_camp_num_type' => 'What Camp Num Type',
            'what_list_number' => 'What List Number',
            'what_list_file_path' => 'What List File Path',
            'what_list_list_id' => 'What List List ID',
            'what_camp_start_datetime' => 'What Camp Start Datetime',
            'what_created_at' => 'What Created At',
            'what_updated_at' => 'What Updated At',
        ];
    }

    public function checkIsCreditAvialabel($CreditCount,$type)
    {

        if($type=="Filtering"){
            $service="Filter";
        }else {
            $service="Whatsapp";
        }

        $UpdateCredit = User_credit::find()->where(['credit_user_id' =>$_SESSION['main_user']['User_id'],'credit_service' =>$service])->one();
        
        $oldAmout=$UpdateCredit->credit_amount;

        if($oldAmout<$CreditCount)
        {
            echo "No Credit avialable"; exit;
        }


        $newAmount=$oldAmout-$CreditCount;

       $UpdateCredit->credit_amount=$newAmount;
       $UpdateCredit->save();

       $transaction= new Transaction_log;
        $transaction->trans_user_id=$_SESSION['main_user']['User_id'];
        $transaction->trans_service=$service;
        $transaction->trans_action="Remove";
        $transaction->trans_old_creadit=$oldAmout;
        $transaction->trans_trans_creadit=$CreditCount;
        $transaction->trans_new_creadit=$newAmount;
        $transaction->trans_tansaction_by=$_SESSION['main_user']['User_id'];
        $transaction->save();


    }
}
