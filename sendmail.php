<?php


$token = "969745652:AAEjjUjSNmfFGNCHfa-WAlfMqKolEBYxFko";
require_once "vendor/autoload.php";

if(isset($_POST['first_name'])){
    $firstName = $_POST['first_name'];
    $userCity = $_POST['user_city'];
    $userPhone = $_POST['user_phone'];

    $mailTo = "info@ua-farmasi.com, ofisfarmasikariuk@gmail.com, farmasi_chumak@ukr.net";
    $subject = "Заявка на консультацию";
    $message = $firstName . " отправил(а) заявку на регистрацию.\r\nМой номер - ".$userPhone." , Город - ".$userCity;
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: UA-FARMASI <info@ua-farmasi.com>';

    if(mail($mailTo,$subject,$message, $headers)){
        echo true;
    }else {
        echo false;
    }

    try {
        $bot = new \TelegramBot\Api\Client($token);

        $bot->command('start', function ($message) use ($bot) {
            $answer = 'Привет! Я буду отправлять тебе сообщения с сайта твой чат айди - '.$message->getChat()->getId();
            $bot->sendMessage($message->getChat()->getId(), $answer);
        });

// команда для помощи
        $bot->command('help', function ($message) use ($bot) {
            $answer = 'Команды:
        /help - вывод справки';
            $bot->sendMessage($message->getChat()->getId(), $answer);
        });
        /*$bot->command('bday', function ($message) use ($bot) {
            $text = $message->getText();
            $param = str_replace('/bday', '', $text);
            if (empty($param)) {
                $answer = 'Вы ничего не написали. Что бы отправить поздравление в начале текста введите команду /bday затем текст.
            Пример "/bday с др"';

                $bot->sendMessage($message->getChat()->getId(), $answer);

            } else {
                $user = $message->getFrom();
                $answer = 'Спасибо большое ' . $user->getFirstName() . '. Еще раз спасибо. Отдуши!';
                $bot->sendMessage($message->getChat()->getId(), $answer);
                $bot->sendMessage("@hinrybday", "Поздравление от ".$user->getFirstName()." - ".$text);
            }
        });*/
        $bot->on(function ($Update) use ($bot) {
            $message = $Update->getMessage();
            $msg_text = $message->getText();

            $bot->sendMessage($message->getChat()->getId(), "Я не понимаю ...");
        }, function () {
            return true;
        });

        $bot->run();

    } catch (\TelegramBot\Api\Exception $e) {
        $e->getMessage();
    }
}