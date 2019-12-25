<?php
if(isset($_POST['first_name'])){
    $firstName = $_POST['first_name'];
    $userMail = $_POST['user_mail'];
    $userPhone = $_POST['user_phone'];

    $mailTo = "info@ua-farmasi.com, ofisfarmasikariuk@gmail.com, farmasi_chumak@ukr.net";
    $subject = "Заявка на консультацию";
    $message = $firstName . " отправил заявку на регистрацию.\r\nМой номер - ".$userPhone." , \r\nи моя почта - ".$userMail;
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: UA-FARMASI <info@ua-farmasi.com>';

    if(mail($mailTo,$subject,$message, $headers)){
        echo true;
    }else {
        echo false;
    }
}