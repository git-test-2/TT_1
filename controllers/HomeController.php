<?php
namespace app\controllers;

session_start();

use app\assets\AppAsset;

use Yii;
use app\models\EntryForm; //импорт имён
use app\models\User;
use yii\base\Model;
use yii\web\Controller;


class HomeController extends Controller //home/index маршрут по умолчанию
{

    public function actionIndex()
    {
        $this->view->title = 'Такие Танки';
        $this->view->registerMetaTag(['name' => 'description', 'content'=>'сайт про танки'],'description');

        return $this->render('index');
    }

    public function actionRegi(){
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new EntryForm();

        if($model->load(\Yii::$app->request->post()) && $model->validate()){
            $user = new User();
            $user->username = $model->username;
            $user->password = \Yii::$app->security->generatePasswordHash($model->password);
            $user->email = $model->email;
            $user->date = $model->date;

            if($user->save()){
                $_SESSION['username'] = $model->username; //добавил в сессиб имя юзера
                return $this->goHome();
            }
        }
        return $this->render('regi', compact('model'));
    }

}