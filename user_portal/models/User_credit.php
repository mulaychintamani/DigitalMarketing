<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nishi_user_credit".
 *
 * @property integer $credit_id
 * @property integer $credit_user_id
 * @property integer $credit_amount
 * @property string $credit_service
 * @property string $credit_created_at
 * @property string $credit_updated_at
 */
class User_credit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nishi_user_credit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['credit_user_id', 'credit_amount', 'credit_service'], 'required'],
            [['credit_user_id', 'credit_amount'], 'integer'],
            [['credit_service'], 'string'],
            [['credit_created_at', 'credit_updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'credit_id' => 'Credit ID',
            'credit_user_id' => 'Credit User ID',
            'credit_amount' => 'Credit Amount',
            'credit_service' => 'Credit Service',
            'credit_created_at' => 'Credit Created At',
            'credit_updated_at' => 'Credit Updated At',
        ];
    }
}
