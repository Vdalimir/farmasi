<?php
include "db.php";
session_start();
if (isset($_SESSION['loggedIn'])) {
    header("location: adminpage.php");
}
if (isset($_POST['log_in'])) {

    $error_log = "";
    $error_pass = "";
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (empty(trim($login))) {
        $error_log = "Введите логин";
    } else {
        $login = $_POST['login'];
    }
    if (empty(trim($password))) {
        $error_pass = "Введите пароль";
    } else {
        $password = $_POST['password'];
    }

    if (empty($error_pass) && empty($error_log)) {

        $sql = "SELECT * FROM users WHERE login = '$login'";

        $res = mysqli_query($link, $sql);

        if ($num_rows = mysqli_num_rows($res) != 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                if ($password != $row['password']) {
                    $error_pass = "Неверный пароль";
                } else {
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['loggedIn'] = true;
                    header("Location: adminpage.php");
                }
            }
        } else {
            $error_log = "Пользователя не существует";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FARMASI</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&display=swap&subset=cyrillic"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oranienbaum&display=swap&subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/duotone.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/mui-noglobals.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="nav">
    <ul>
        <li><a href="../" class="active">ГЛАВНАЯ</a></li>
        <li><a href="../#about">О КОМПАНИИ</a></li>
        <li><a href="../#stock">АКЦИИ</a></li>
        <li><a href="../#catalog">КАТАЛОГ</a></li>
        <li><a href="../#marketing">МАРКЕТИНГ</a></li>
        <li><a href="../#contacts">КОНТАКТЫ</a></li>
    </ul>

    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
    <div class="nav-reg">
        <a href="index.php#registration" class="link-reg">РЕГИСТРАЦИЯ</a>
    </div>
</nav>

<div class="block-login">
    <div class="container">
        <div class="form-login">
            <form class="mui-form" method="post" action="login.php">
                <legend>Авторизация</legend>
                <div class="mui-textfield mui-textfield--float-label">
                    <input type="text" name="login" required>
                    <label>Логин</label>
                </div>

                <p class="error-login text-red"><?php if (!empty($error_log)) echo $error_log ?></p>
                <div class="mui-textfield mui-textfield--float-label">
                    <input type="password" name="password" required>
                    <label>Пароль</label>
                </div>

                <p class="error-pass text-red"><?php if (!empty($error_pass)) echo $error_pass ?></p>

                <button id="btn-registration" class="btn btn-login mt-30" name="log_in"
                        type="submit">войти
                </button>
            </form>
        </div>
    </div>
</div>
<a href="#" class="link-to-top"><i class="fad fa-arrow-alt-to-top fa-2x text-red"></i></a>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/jquery.mask.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mui.min.js"></script>
<script src="js/jquery.scroolly.min.js"></script>
<script src="js/parallax.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
