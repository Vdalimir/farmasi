<?php
include "db.php";
session_start();

if (isset($_POST["addPhone"])) {

    $phone = $_POST['phone'];

    if ($phone) {
        $sql_phone = "INSERT INTO phone_numbers (phone) value ('$phone')";

        if ($link->query($sql_phone) === TRUE) {
            $_SESSION['result_addphone'] = "Номер успешно добавлен";
            header("location: adminpage.php");
        } else {
            $error = "Error: " . $sql_phone . "<br>" . $link->error;
            $_SESSION['error_addphone'] = $error;
            header("location: adminpage.php");
        }
    } else {
        $error = "Номер не может быть пустым";
        $_SESSION['error_addphone'] = $error;
        header("location: adminpage.php");
    }
}

if (isset($_POST["delete_id"])) {

    $phone_id = $_POST['delete_id'];
    $query = "DELETE from phone_numbers where id = '$phone_id'";

    if(mysqli_query($link,$query)){
        echo $result = mysqli_query($link,$query);
    }
    else{
        echo "FALSE";
    }
}



