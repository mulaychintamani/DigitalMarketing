<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nishi_transaction_log".
 *
 * @property integer $trans_id
 * @property integer $trans_user_id
 * @property string $trans_service
 * @property string $trans_action
 * @property integer $trans_old_creadit
 * @property integer $trans_trans_creadit
 * @property integer $trans_new_creadit
 * @property integer $trans_tansaction_by
 * @property string $trans_created_at
 */
class Transaction_log extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nishi_transaction_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trans_user_id', 'trans_action', 'trans_old_creadit', 'trans_trans_creadit', 'trans_new_creadit', 'trans_tansaction_by'], 'required'],
            [['trans_user_id', 'trans_old_creadit', 'trans_trans_creadit', 'trans_new_creadit', 'trans_tansaction_by'], 'integer'],
            [['trans_action'], 'string'],
            [['trans_created_at'], 'safe'],
            [['trans_service'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'trans_id' => 'Trans ID',
            'trans_user_id' => 'Trans User ID',
            'trans_service' => 'Trans Service',
            'trans_action' => 'Trans Action',
            'trans_old_creadit' => 'Trans Old Creadit',
            'trans_trans_creadit' => 'Trans Trans Creadit',
            'trans_new_creadit' => 'Trans New Creadit',
            'trans_tansaction_by' => 'Trans Tansaction By',
            'trans_created_at' => 'Trans Created At',
        ];
    }
}
