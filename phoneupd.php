<?php
include "db.php";
session_start();

if (isset($_POST["updatePhone"])) {

    $id = $_POST['id'];
    $phone = $_POST['phone'];

    if ($phone) {
        $sql_phone = "UPDATE phone_numbers SET phone = '$phone' WHERE id = '$id'";

        if ($link->query($sql_phone) === TRUE) {
            $_SESSION['result_phone'] = "Номер успешно обновлён";
            header("location: adminpage.php#view-phone-numbers");
        } else {
            $error = "Error: " . $sql_phone . "<br>" . $link->error;
            $_SESSION['error_phone'] = $error;
            header("location: adminpage.php#view-phone-numbers");
        }
    } else {
        $error = "Номер не может быть пустым";
        $_SESSION['error_phone'] = $error;
        header("location: adminpage.php#view-phone-numbers");
    }
}
