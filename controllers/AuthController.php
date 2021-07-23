<?php

namespace app\controllers;

use app\models\AuthForm;
use Yii;
use yii\web\Controller;
use yii\web\Response;

//use yii\web\User;
use app\models\User;


class AuthController extends Controller
{

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new AuthForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        //$model->password = '';
        return $this->render('/home/auth', [
            'model' => $model,
        ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

//
////    public function actionTest()
////    {
////        $user = User::findOne(1);
////        Yii::$app->user->login($user);
////        //Yii::$app->user->logout();
////
////        if(Yii::$app->user->isGuest){
////            echo 'Пользователь гость';
////        } else {
////            echo 'Пользователь Авторизован';
////        }
////
////       //var_dump( Yii::$app->components);
////       //var_dump( Yii::$app->user);
////    }


}