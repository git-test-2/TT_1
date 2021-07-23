<h1>Авторизация</h1>

<?php
use app\models\AuthForm;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="container"> <!-- поскольку испоьзуем bootstrap разметку, указываем что всё находится в контейнере -->
    <div class="row">

        <div class="col-md-12">


            <?php $form = ActiveForm::begin([
                'id' =>'my-form', //даём id форме
                'enableClientValidation' => true, //отключить валидацию на клиентской стороне, по умолчанию она стоит как true
                'options'=>['class'=>'form-horizontal', //делаем форму горизрнтальную, это bootstrap
                ],
                //по умолчанию в Yii2 метод POST, може тут указать метод GET если надо, 'action'=>'$_GET',
                'fieldConfig' => [ //вынесли настройки для полей, шаблон и свойсва лейблов, вынесли в конфигурацию всей формы.
                    //можно для каждого поля прописать отдельную конфигурацию или 'template'
                    'template'=>"{label} \n <div class='col-md-5'>{input}</div> \n <div class='col-md-5'>{hint}</div> \n <div class='col-md-5'>{error}</div>",
                    'labelOptions'=>['class'=>'col-md-2 control-label'], //обявиви два класса бутсрапа в свойсве Yii2 'labelOptions'
                ]
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <div class="col-md-5 col-md-offset-2">
                    <?= Html::submitButton('Авторизация', ['class'=>'btn-btn-default btn-block']) ?>
                </div>
            </div>
            <?php ActiveForm::end() ?>

        </div>

    </div>
</div>