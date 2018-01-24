<?php

namespace app\models;

use Yii;

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
            [[ 'user_name', 'user_password', 'user_client_name', 'user_email', 'user_mobile', 'user_acc_type', 'user_service_details_id'], 'required'],
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
            'user_type' => 'User Type',
            'user_name' => 'User Name',
            'user_password' => 'User Password',
            'user_client_name' => 'User Client Name',
            'user_company' => 'User Company',
            'user_email' => 'User Email',
            'user_mobile' => 'User Mobile',
            'user_acc_type' => 'User Acc Type',
            'user_service_details_id' => 'User Service Details ID',
            'user_created_at' => 'User Created At',
            'user_updated_at' => 'User Updated At',
        ];
    }
}
