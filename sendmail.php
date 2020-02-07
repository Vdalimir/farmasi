<?php


$teletoken = "882116321:AAGX1TWys8Ka9Rlh9WhdAio1QA9v_2yvSVU";
require_once "vendor/autoload.php";

try {
    $bot = new \TelegramBot\Api\Client($teletoken);


    $bot->command('start', function ($message) use ($bot) {
        $answer = 'Привет! меня создали, но я пока что мало чего умею... Заходи ко мне позже и я расскажу чему научился.';
        $bot->sendMessage($message->getChat()->getId(), $answer);
    });

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
if (isset($_POST['first_name'])) {
    $firstName = $_POST['first_name'];
    $userCity = $_POST['user_city'];
    $userPhone = $_POST['user_phone'];
    $target = $_POST['target'];
    $comment = htmlspecialchars($_POST['comment']);

    $mailTo = "info@ua-farmasi.com, ofisfarmasikariuk@gmail.com, farmasi_chumak@ukr.net";
    $subject = "Заявка на консультацию";
    $message = $firstName . " отправил(а) заявку на регистрацию.\r\nМой номер - " . $userPhone . " , Город - " . $userCity . ", Цель регистрации - ".$target. " , Коментарий - ".$comment;
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: UA-FARMASI <info@ua-farmasi.com>';

    if (mail($mailTo, $subject, $message, $headers)) {
        echo true;
    } else {
        echo false;
    }

    $bot->sendMEssage(387529713, "Новая заявка с сайта
Имя - $firstName
Город - $userCity
Мобильный $userPhone
Цель регистрации - $target
Коментарий - $comment");
}
