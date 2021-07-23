<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


//реализуем интерфейс IdentityInterface
class User extends ActiveRecord implements IdentityInterface

{
    //Проблема в модели User. Поскольку теперь в модель данные загружаются из формы,
    // то все свойства, которые находилсь по умолчанию в этой модели — не нужны
//    public $id;
//    public $username;
//    public $password;
//    public $authKey;
//    public $accessToken;
//
//    private static $users = [
//        '100' => [
//            'id' => '100',
//            'username' => 'admin',
//            'password' => 'admin',
//            'authKey' => 'test100key',
//            'accessToken' => '100-token',
//        ],
//        '101' => [
//            'id' => '101',
//            'username' => 'demo',
//            'password' => 'demo',
//            'authKey' => 'test101key',
//            'accessToken' => '101-token',
//        ],
//    ];


    public function date()
    {
        return $this->date;
    }

    public function email()
    {
        return $this->email;
    }

    public static function findIdentity($id)
    {
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        return User::findOne($id); //возвращаем юзера по id
    }


    public function getId()
    {
        return $this->id; //просто возвращаем id
    }

    public static function findByUsername($username)
    {
//        foreach (self::$users as $user) {
//            if (strcasecmp($user['username'], $username) === 0) {
//                return new static($user);
//            }
//        }
//        return null;
        return User::find()->where(['username'=>$username])->one();
    }

    public function validatePassword($password)
    {
        return ($this->password === $password) ? true : false;
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }


    public function getAuthKey()
    {
        return $this->authKey;
    }


    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }


}
