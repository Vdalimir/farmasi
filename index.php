<?php
include 'db.php';
session_start();
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
        <li><a href="#" class="active">ГЛАВНАЯ</a></li>
        <li><a href="#about">О КОМПАНИИ</a></li>
        <li><a href="#stock">АКЦИИ</a></li>
        <li><a href="#catalog">КАТАЛОГ</a></li>
        <li><a href="#marketing">МАРКЕТИНГ</a></li>
        <li><a href="#contacts">КОНТАКТЫ</a></li>
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
        <a href="#registration" class="link-reg">РЕГИСТРАЦИЯ</a>
    </div>
</nav>

<header>
    <div class="bg-hero">
        <img src="img/imghero.jpg" alt="">
    </div>
    <div class="hero-text">
        <div id="scene" class="scene">
            <div data-depth="1"><img src="img/abstract.png" alt=""/></div>
        </div>
        <div class="container">
            <div id="hero-text">
                <h1>
                    FARMASI
                </h1>
                <p>ДОСТУПНАЯ КОСМЕТИКА</p>
            </div>
        </div>
    </div>
</header>
<section id="about" class="about">
    <h1>
        О КОМПАНИИ
    </h1>

    <div class="block-about">
        <div class="container text-center">
            <div class='owl-carousel'>
                <div class="item">
                    <p class="text-hero-about text-center">Международный бренд и производитель высококачественной
                        косметической продукции</p>
                    <div class="block-icons">
                        <div class="icon">
                            <i class="fad fa-flask-potion fa-5x"></i>
                            <p>Производитель косметики, бытовой химии, средств для ухода за лицом и телом</p>
                        </div>
                        <div class="icon">
                            <i class="fad fa-file-certificate fa-5x"></i>
                            <p>Продукция, которая сертифицирована согласно всем международным стандартам</p>
                        </div>
                        <div class="icon">
                            <i class="fad fa-building fa-5x"></i>
                            <p>Собственное производство полного цикла (от личной воды со скважин до упаковки)</p>
                        </div>
                        <div class="icon">
                            <i class="fad fa-atom-alt fa-5x"></i>
                            <p>69-летний опыт и самые современные технологии производства</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <p class="text-hero-about text-center">Возможность экономии</p>
                    <div class="block-icons">
                        <div class="icon">
                            <i class="fad fa-badge-percent fa-5x"></i>
                            <p>Скидка на всю продукцию до 30% уже с первого заказа</p>
                        </div>
                        <div class="icon">
                            <i class="fad fa-truck fa-5x"></i>
                            <p>Бесплатная доставка от 700 грн</p>
                        </div>
                        <div class="icon">
                            <i class="fad fa-gifts fa-5x"></i>
                            <p>Возможность принимать участие в розыгрышах и акциях</p>
                        </div>
                        <div class="icon">
                            <i class="fad fa-island-tropical fa-5x"></i>
                            <p>Возможность путешествовать за счет компании</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <p class="text-hero-about text-center">Дополнительный доход</p>
                    <div class="block-icons">
                        <div class="icon">
                            <i class="fad fa-money-bill fa-5x"></i>
                            <p>Если ты хочешь работать когда захочешь и сколько захочешь</p>
                        </div>
                        <div class="icon">
                            <i class="fad fa-chart-line fa-5x"></i>
                            <p>Если у тебя есть основная работа, но ты хочешь увеличить свой доход</p>
                        </div>
                        <div class="icon">
                            <i class="fad fa-graduation-cap fa-5x"></i>
                            <p>Если ты студент и хочешь подзаработать или заработать на обучение</p>
                        </div>
                        <div class="icon">
                            <i class="fad fa-hands-usd fa-5x"></i>
                            <p>Если ты мама и хочешь увеличить доход не выходя из дома</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <p class="text-hero-about text-center">Возможность создать свой личный успешный бизнес</p>
                    <div class="block-icons">
                        <div class="icon">
                            <i class="fad fa-grin-wink fa-5x"></i>
                            <p>Возможность развития себя как личности</p>
                        </div>
                        <div class="icon">
                            <i class="fad fa-chalkboard-teacher fa-5x"></i>
                            <p>Бесплатное обучение на всех этапах построения личного бизнеса</p>
                        </div>
                        <div class="icon">
                            <i class="fad fa-cogs fa-5x"></i>
                            <p>Бесплатные современные инструменты для эффективной работы</p>
                        </div>
                        <div class="icon">
                            <i class="fad fa-box-usd fa-5x"></i>
                            <p>Мотивационные программы и большие вознаграждения</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="stock" class="stock">
    <div class="container">
        <div class="text-center">
            <h1>АКЦИЯ</h1>
            <p class="text-red mt-15">красивый старт</p>
        </div>


        <div class="stock_block">
            <div id="stock-scene-abstr">
                <img src="img/stockabstr.png" alt=""/>
            </div>
            <div class="stock-text">
                <div>Постоянные действующие акции
                    для тех, кто только
                    зарегистрировался.
                    <br>
                    <div class="view-stock-img mt-10">
                        <p id="view-stock-img">Просмотр акции <i class="fad fa-eye"></i> </p>
                        <div class="view-img">
                            <div class="container p-0">
                                <span id="close-stock" class="text-red mt-20"><i class="fad fa-times fa-2x text-red"></i></span>
                                <div class="images">
                                    <?php
                                    $sql = "SELECT * FROM stock";

                                    $res = mysqli_query($link, $sql);
                                    if (mysqli_num_rows($res) != 0) {
                                        $row = mysqli_fetch_assoc($res);
                                        echo "
                                          <img src='".$row['img_url_1']."'/>
                                          <img src='".$row['img_url_2']."'/>
                                              ";
                                    } else {
                                        echo 'Ошибка запроса: ' . mysqli_error($link);
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <br>
                    <span>Подарки 4 месяца подряд.</span>
                    <a href="#registration">Быстрая регистрация</a>

                </div>

            </div>
            <div class="stock-images">
                <div class="text-center" id="stock-scene">
                    <div data-depth="0.6" class="stock-img img1">
                        <div>
                            <img src="img/pomada2.png" alt=""/>
                        </div>

                    </div>
                    <div data-depth="0.6" class="stock-img img2">
                        <img src="img/brash2.png" alt=""/>
                    </div>
                    <div data-depth="1" class="stock-img img3">
                        <img src="img/glam.png" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="catalog" class="catalog">

    <div id="catalog-scene" class="catalog-scene">
        <div id="scrollimg1">
            <img src="img/redline.png" alt=""/>
        </div>
        <div id="scrollimg2">
            <img src="img/whiteline.png" alt=""/>
        </div>
    </div>
    <div class="container">
        <div class="text-center">
            <h1>КАТАЛОГ</h1>
            <p class="text-red mt-15">пользуйтесь актуальными предложениями и акциями</p>
        </div>
        <div class="catalog-block text-center">
            <div class="img-catalog">
                <p>обновления каждый месяц</p>
                <?php
                $sql_cat = "SELECT * FROM catalog";

                $res_cat = mysqli_query($link, $sql_cat);
                if (mysqli_num_rows($res_cat) != 0) {
                    $row_cat = mysqli_fetch_assoc($res_cat);
                    echo "<img src='".$row_cat['img_dir']."'/>
                    <a href='".$row_cat['download_url']."' target='_blank' class='downloadCat'>скачать PDF файл</a>";
                } else {
                    echo 'Ошибка запроса: ' . mysqli_error($link);
                }
                ?>

            </div>
        </div>
    </div>
</section>
<section id="marketing" class="marketing">
    <div id="marketing-scene">
        <div data-depth="1">
            <img src="img/cubes.png" alt=""/>
        </div>
    </div>
    <div class="container">
        <div class="marketing-text text-center">
            <h1>МАРКЕТИНГ ПЛАН</h1>
            <p class="text-red mt-15">цифры которые ведут к успеху</p>
        </div>
        <div class="block-marketing">
            <div class="marketing-image">
                <img src="img/imgmarketing.jpg" alt=""/>
            </div>
            <div class="view-marketing">
                <div class="container p-0">
                    <span id="close-marketing" class="text-red mt-20"><i class="fad fa-times fa-2x text-red"></i></span>
                    <img src="img/farmasi-mp2.jpg">
                </div>
            </div>
            <div class="marketing-block-text">
                <h2>СКИДКА КОНСУЛЬТАНТА</h2>
                <p>Зарегистрируйся в компании и сразу получай максимальные скидки на всю продукцию
                </p>
                <p>до <span>30%</span></p>
                <div class="marketing-link">нажмите что бы посмотреть <a id="open_marketing">маркетинг план</a></div>
            </div>
        </div>
    </div>
</section>
<section id="registration" class="registration">
    <div class="container-fluid">
        <div class="block-reg">

            <div class="reg-img">
                <img src="img/bgreg.png" alt=""/>
            </div>
            <div class="header-reg">
                <h1>РЕГИСТРАЦИЯ</h1>
                <p class="mt-20">ПОЛУЧИ СКИДКУ УЖЕ СЕГОДНЯ В 1 КЛИК!</p>
            </div>
            <div class="form-reg">
                <div></div>
                <div class="block-form">
                    <p class="text-reg">Быстрая регистрация</p>
                    <p class="text-manager mt-20">менеджер онлайн <i class="fad fa-circle text-green"></i></p>
                    <form class="mui-form" id="form_registration">
                        <div class="mui-textfield mui-textfield--float-label mt-30">
                            <input type="text" id="first_name" name="first_name" required>
                            <label>Ваше имя</label>
                        </div>
                        <div class="mui-textfield mui-textfield--float-label mt-30">
                            <input type="text" id="user_city" name="user_city" required>
                            <label>Город</label>
                        </div>
                        <div class="mui-textfield mt-30">
                            <input type="text" id="user_phone" name="user_phone" required>
                            <label>Мобильный номер</label>
                        </div>
                        <div class="mui-checkbox mui--text-black">
                            <label>
                                <input type="checkbox" id="check_policy" name="check_policy" checked>
                                Согласен с <a href="policy.php">политикой конфиденциальности</a>
                            </label>
                        </div>
                        <input type="button" id="start_registration"
                               class="mui-btn mui-btn--raised" name="start_registration"
                               value="Отправить заявку" disabled="disabled"/>
                    </form>
                    <div class="form-send-preload text-center">
                        <div class="form-preload">
                            <i class="fad fa-sync-alt fa-spin fa-3x text-blue"></i>
                        </div>
                    </div>
                    <div class="form-send-error text-center">
                        <h3 class="text-red">
                            <i class="fad fa-frown fa-2x"></i>
                            <br>
                            Извините, что то пошло не так. Попробуйте пожалуйста позже или позвоните по указанным номерам в разделе контакты.</h3>
                    </div>
                    <div class="form-send-success text-center">
                        <h3 class="mui--text-black">
                            <i class="fad fa-check mui--text-accent fa-2x"></i>
                            <br>
                            Спасибо! Ваша заявка успешно отправлена. Мы свяжемся с вами в ближайшее время.</h3>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<section id="contacts"class="contacts">
    <div class="contact-header text-center">
        <h1>СВЯЖИТЕСЬ С НАМИ</h1>
        <p class="text-red mt-20">остались вопросы?</p>
    </div>
    <div class="contacts-block">
        <div class="contacts-item">
            <div class="item">
                <p>Позвоните нам</p>
                <?php
                $sql_phone = "SELECT * FROM phone_numbers";

                $res_phone = mysqli_query($link, $sql_phone);

                if (mysqli_num_rows($res_phone) != 0) {
                    while($row_phone = mysqli_fetch_assoc($res_phone)){
                        echo "<a href='tel:".$row_phone['phone']."'>".$row_phone['phone']."</a>";
                    }
                } else {
                    echo '<p>Номеров пока что нет</p>';
                }
                ?>
            </div>
            <div class="item">
                <p>Напишите нам</p>
                <a href="mailto:ofisfarmasikariuk@gmail.com">ofisfarmasikariuk@gmail.com</a>
            </div>
            <div class="social-item">
                <div class="item">
                    <a href="tg://resolve?domain=yuliakaryuk"><i class="fab fa-telegram-plane fa-2x"></i></a>
                </div>
                <div class="item">
                    <?php
                    function check_mobile_device() {
                        $mobile_agent_array = array('ipad', 'iphone', 'android', 'pocket', 'palm', 'windows ce', 'windowsce', 'cellphone', 'opera mobi', 'ipod', 'small', 'sharp', 'sonyericsson', 'symbian', 'opera mini', 'nokia', 'htc_', 'samsung', 'motorola', 'smartphone', 'blackberry', 'playstation portable', 'tablet browser');
                        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
                        foreach ($mobile_agent_array as $value) {
                            if (strpos($agent, $value) !== false) return true;
                        };
                        return false;
                    };
                    ?>
                    <? if(check_mobile_device()) :?>
                        <a href="viber://add?number=380666753454"><i class="fab fa-viber fa-2x"></i></a>
                    <? else : ?>
                        <a title="Должен быть устоновлен Viber для ПК" href="viber://chat?number=+380666753454"><i class="fab fa-viber fa-2x"></i></a>
                    <? endif; ?>

                </div>
                <div class="item">
                    <a href="https://instagram.com/sergeevna_juliia" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
                </div>
                <div class="item">
                    <a href="https://www.facebook.com/yuliafarmasi.05" target="_blank"><i class="fab fa-facebook-f fa-2x"></i></a>
                </div>
            </div>
        </div>

    </div>
</section>
<footer>
    <p class="text-center">2019 © Сайт представителя компании Farmasi Украина</p>
</footer>
<a href="#" class="link-to-top"><i class="fad fa-arrow-alt-to-top fa-2x text-red"></i></a>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/jquery.mask.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mui.min.js"></script>
<script src="js/jquery.scroolly.min.js"></script>
<script src="js/parallax.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/script.js"></script>
<script type="text/javascript">
    var scene = new Parallax(document.getElementById('scene'));
    var scene = new Parallax(document.getElementById('stock-scene'));
    var scene = new Parallax(document.getElementById('marketing-scene'));
</script>
</body>
</html>