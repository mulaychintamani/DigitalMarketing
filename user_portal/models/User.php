<?php

namespace app\models;
use Yii;
use  yii\web\Session;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        
        $userRecord = Portal_user::find()
            ->where(['user_name' => $username])
            ->one(); 

        if(count($userRecord)>0){
           return $userRecord;
        }

        
        /*foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                 return new static($user);
            }
        }*/


        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password,$user)
    {
          // echo "<br>"; print_r($_POST); echo "==".$password; exit;
        if($_POST['LoginForm']['password'] === $password){

            $session = Yii::$app->session;
            $data=$arrayName = array('user_type' =>  $user->user_type,
                'user_name' =>  $user->user_name,
                'user_email' =>  $user->user_email,
                'user_acc_type' =>  $user->user_acc_type, );
           //$session->set('user',  $data);  
            $_SESSION['main_user']=$data;   
            
        return true;
        }

    }
}
