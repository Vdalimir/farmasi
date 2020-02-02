<?php

include "sendmail.php";
require_once "vendor/autoload.php";

$gkey = "gkeyfarmasigkey";
if(isset($_POST)){
    $data = json_decode(file_get_contents('php://input'));

    if($gkey == $data->google_key){
        $text = "Заявка с гугл формы - ". $data->user_column_data->string_value;
        $bot->sendMEssage(450790032, $text);
    }

}