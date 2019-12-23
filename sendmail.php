<?php
if(isset($_POST['start_reg'])){
    $firstName = $_POST['first_name'];
    $userMail = $_POST['user_mail'];
    $userPhone = $_POST['user_phone'];

    $mailTo = "info@ua-farmasi.com, vladimir.hrinin@gmail.com";
    $subject = "Заявка на консультацию";
    $message = $firstName . " оставил сообщение: Хочу получить консультацию.\r\nМой номер ".$userPhone." , \r\nи моя почта ".$userMail;
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: INVEST-TG <info@invest-tg.com>';


    if(mail($mailTo,$subject,$message, $headers)){
        echo true;
    }else {
        echo false;
    }
}