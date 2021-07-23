<?php

use app\assets\AppAsset;
use yii\helpers\Html;

//подключили комплект ресурсов
AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>


</head>
<body>
<?php $this->beginBody() ?>

<header>
    <div class="logo">
        <a href="index.html"><img class="graficlogo" src="img/logo_tt.png" alt="logo"></a>
    </div>
    <nav>
        <div class="topnav" id="myTopnav">
            <a href="/home">HOME</a>
            <a href="/home/regi">РЕГИСТРАЦИЯ</a>
            <a href="">BLOG</a>
            <a href="">CONTACT</a>
            <a href="">ABOUT</a>
            <a href="">SERVICES</a>
            <a href="">LOCATION</a>

            <a href="/auth/login">ВХОД
                <?= \Yii::$app->user->identity->username ?>
            </a>

            <a href="/auth/logout">Выход</a>

            <a id="menu" href="#" class="icon">&#9776</a>
        </div>
    </nav>
</header>
<main>

    <?= $content ?>

</main>
<footer>
    <nav>
            <a href="index.html">HOME</a>
            <a href="">PROJECTS</a>
            <a href="">BLOG</a>
            <a href="">CONTACT</a>
            <a href="">ABOUT</a>
            <a href="">SERVICES</a>
            <a href="">LOCATION</a>
    </nav>
    <div class="logo">
        <a href="index.html"><img class="graficlogo" src="img/logo_tt.png" alt=""></a>
    </div>
    <div class="social">
        <a href="#"><img src="img/social_icons/iconfinder_facebook.png" alt=""></a>
        <a href="#"><img src="img/social_icons/iconfinder_youtube.png" alt=""></a>
        <a href="#"><img src="img/social_icons/iconfinder_vk.png" alt=""></a>

    </div>
    <p>TT 2021</p>
</footer>

<script src="js/script.js"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>