<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class AuthForm extends Model
{
    public $username;
    public $password;

    private $_user = false;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
        ];
    }


    public function login()
    {
       if($this->validate()){
           return Yii::$app->user->login($this->getUser());
       }

       return false;
    }


    public function getUser()
    {
        if($this->_user === false)
        {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }


}