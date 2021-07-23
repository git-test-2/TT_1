<?php

namespace app\models;
use yii\base\Model;

class EntryForm extends Model{

    public $username;
    public $password;

    public $email;

    public $date;

    public function rules() {
        return [
            [['username', 'password','email','date'], 'required', 'message' => 'Заполните поле'],
            ['email','email'],
        ];
    }

    public function attributeLabels() {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',


        ];
    }
}

?>