<?php

include "sendmail.php";
require_once "vendor/autoload.php";


if(isset($_POST)){
    $data = json_decode(file_get_contents('php://input'), true);


    $bot->sendMEssage(450790032, "Тест гугл -ключ --".$data->google_key);
}