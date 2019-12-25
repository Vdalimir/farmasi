<?php
include "db.php";
session_start();
if ($_SESSION["loggedIn"] != true) {
    header("location: login.php");
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
        <?php
        if (isset($_SESSION['loggedIn'])) {
            echo "<li><a href='adminpage.php'>АДМИН ПАНЕЛЬ</a></li>";
        }
        ?>
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

<div class="block-admin">
    <div class="container">
        <h1>Добро пожаловать <?php echo $_SESSION['user_name'] ?></h1>
        <br>
        <a class="btn-login" href="logout.php">Выйти</a>

        <div class="view-stock">
            <h2>Акция</h2>
            <?php
            if (isset($_SESSION['result_stock'])) {
                echo "<p class='notify'>" . $_SESSION['result_stock'] . "</p>";
                unset($_SESSION['result_stock']);
            }
            ?>
            <?php if (isset($_SESSION['error_stock'])) echo "<span class='error'>".$_SESSION['error_stock']."</span>"; unset($_SESSION['error_stock']);?>
            <?php
            $sql = "SELECT * FROM stock";

            $res = mysqli_query($link, $sql);
            if (mysqli_num_rows($res) != 0) {
                $row = mysqli_fetch_assoc($res);
                echo "<form class='mui-form form-stock' enctype='multipart/form-data' method='post' action='stockupdate.php'>
                <input type='hidden' name='id' value='".$row['id']."'/>
                <p class='text-red'>Добавлять только по 2 изображения.</p>
                <div class='mui-textfield mui-textfield--float-label'>
                    <input type='text' name='stock_name' value='" . $row['name'] . "' required>
                    <label>Заголовок</label>
                </div>
                <div class='view-images'>
                    <input type='hidden' name='img_url_1' value='" . $row['img_url_1'] . "'>
                    <input type='hidden' name='img_url_2' value='" . $row['img_url_2'] . "'>
                    
                    <img src='" . $row['img_url_1'] . "' />
                    <input type='file' name='file_1' id='file_1' class='inputfile'
                       data-multiple-caption='{count} files selected'/>
                    <label for='file_1'><i class='fad fa-upload'></i>  <span>Выбрать другой файл</span></label>
                    
                    
                    
                    <img src='" . $row['img_url_2'] . "' />
                    <input type='file' name='file_2' id='file_2' class='inputfile'
                       data-multiple-caption='{count} files selected'/>
                    <label for='file_2'><i class='fad fa-upload'></i>  <span>Выбрать другой файл</span></label>
                </div>
                <button type='submit' name='updateStock' class='mui-btn mui-btn--raised' style='margin: unset'>Сохранить</button>
                </form>";
            } else {
                echo 'Ошибка запроса: ' . mysqli_error($link);
            }
            ?>

        </div>
        <div class="view-catalog mt-30">
            <h2>Каталог</h2>
            <?php
            if (isset($_SESSION['result_cat'])) {
                echo "<p class='notify'>" . $_SESSION['result_cat'] . "</p>";
                unset($_SESSION['result_cat']);
            }
            ?>
            <?php if (isset($_SESSION['error_cat'])) echo "<span class='error'>".$_SESSION['error_cat']."</span>"; unset($_SESSION['error_cat']);?>
            <?php
            $sql_cat = "SELECT * FROM catalog";

            $res_cat = mysqli_query($link, $sql_cat);
            if (mysqli_num_rows($res_cat) != 0) {
                $row_cat = mysqli_fetch_assoc($res_cat);
                echo "<form class='mui-form form-stock' enctype='multipart/form-data' method='post' action='catalogupd.php'>
                <input type='hidden' name='id' value='".$row_cat['id']."'/>
               
                <div class='mui-textfield mui-textfield--float-label'>
                    <input type='text' name='dwn_url' value='" . $row_cat['download_url'] . "' required>
                    <label>Ссылка для просмотра</label>
                </div>
                <div class='view-images'>
                    <input type='hidden' name='img_dir' value='" . $row_cat['img_dir'] . "'>
                    
                    <img src='" . $row_cat['img_dir'] . "' />
                    <input type='file' name='file' id='file' class='inputfile'
                       data-multiple-caption='{count} files selected'/>
                    <label for='file'><i class='fad fa-upload'></i>  <span>Выбрать другой файл</span></label>
                    
                </div>
                <button type='submit' name='updateCat' class='mui-btn mui-btn--raised' style='margin: unset'>Сохранить</button>
                </form>";
            } else {
                echo 'Ошибка запроса: ' . mysqli_error($link);
            }
            ?>
        </div>
        <div class="view-phones">
            <h2>Номера</h2>
        </div>
    </div>
</div>
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

