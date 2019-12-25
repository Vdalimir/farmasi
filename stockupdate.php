<?php
include "db.php";
session_start();

$error = "";

if (isset($_POST["updateStock"])) {
    $id = $_POST['id'];
    $stock_name = $_POST['stock_name'];

    if ($_FILES['file_1']['name'] != null || $_FILES['file_2']['name'] != null) {
        $target_dir = "img/";

        $target_file_1_name = basename($_FILES["file_1"]["name"]);
        $target_file_2_name = basename($_FILES["file_2"]["name"]);

        $target_file_1 = $target_dir . $target_file_1_name;
        $target_file_2 = $target_dir . $target_file_2_name;

        if (file_exists($target_file_1)) {
            $rawBaseName = pathinfo($target_file_1_name, PATHINFO_FILENAME);
            $extension = pathinfo($target_file_1_name, PATHINFO_EXTENSION);
            $counter = 0;
            while (file_exists($target_file_1)) {
                $target_file_1_name = $rawBaseName . $counter . '.' . $extension;
                $target_file_1 = $target_dir . $target_file_1_name;
                $counter++;
            };
        }
        if (file_exists($target_file_2)) {
            $rawBaseName = pathinfo($target_file_2_name, PATHINFO_FILENAME);
            $extension = pathinfo($target_file_2_name, PATHINFO_EXTENSION);
            $counter = 0;
            while (file_exists($target_file_2)) {
                $target_file_2_name = $rawBaseName . $counter . '.' . $extension;
                $target_file_2 = $target_dir . $target_file_2_name;
                $counter++;
            };
        }
        $check = getimagesize($_FILES["file_1"]["tmp_name"]);
        if ($check !== false) {
            if (($check[2] !== IMAGETYPE_GIF) && ($check[2] !== IMAGETYPE_JPEG)
                && ($check[2] !== IMAGETYPE_BMP) && ($check[2])
                && ($check[2] !== IMAGETYPE_PNG)) {
                $error = "Файл не является иображением (возможные форматы JPEG, PNG, GIF, BMP)";
                $_SESSION['error_stock'] = $error;
                header("location: adminpage.php");
            }
        } else {
            $error = "Файл пуст или не является иображением (возможные форматы JPEG, PNG, GIF, BMP)";
            $_SESSION['error_stock'] = $error;
            header("location: adminpage.php");
        }
        $check2 = getimagesize($_FILES["file_2"]["tmp_name"]);
        if ($check2 !== false) {
            if (($check2[2] !== IMAGETYPE_GIF) && ($check2[2] !== IMAGETYPE_JPEG)
                && ($check2[2] !== IMAGETYPE_BMP) && ($check2[2])
                && ($check2[2] !== IMAGETYPE_PNG)) {
                $error = "Файл не является иображением (возможные форматы JPEG, PNG, GIF, BMP)";
                $_SESSION['error_stock'] = $error;
                header("location: adminpage.php");
            }
        } else {
            $error = "Файл пуст или не является иображением (возможные форматы JPEG, PNG, GIF, BMP)";
            $_SESSION['error_stock'] = $error;
            header("location: adminpage.php");
        }

        if (empty($error)) {
            if ($stock_name != null) {
                $sql_stock = "UPDATE stock SET name = '$stock_name', img_url_1 = '$target_file_1', img_url_2 = '$target_file_2' WHERE id = '$id'";

                if ($link->query($sql_stock) === TRUE) {
                    unlink($_POST['img_url_1']);
                    unlink($_POST['img_url_2']);
                    move_uploaded_file($_FILES['file_1']['tmp_name'], $target_file_1);
                    move_uploaded_file($_FILES['file_2']['tmp_name'], $target_file_2);
                    $_SESSION['result_stock'] = "Акция успешно обновлена";
                    header("location: adminpage.php");
                } else {
                    $error = "Error: " . $sql_stock . "<br>" . $link->error;
                    $_SESSION['error_stock'] = $error;
                    header("location: adminpage.php");
                }
            } else {
                $error = "Заполните все поля";
                $_SESSION['error_stock'] = $error;
                header("location: adminpage.php");
            }
        }
    } else {
        if ($stock_name) {
            $sql_stock = "UPDATE stock SET name = '$stock_name' WHERE id = '$id'";

            if ($link->query($sql_stock) === TRUE) {
                $_SESSION['result_stock'] = "Новость успешно обновлена";
                header("location: adminpage.php");
            } else {
                $error = "Error: " . $sql_stock . "<br>" . $link->error;
                $_SESSION['error_stock'] = $error;
                header("location: adminpage.php");
            }
        } else {
            $error = "Заполните все поля";
            $_SESSION['error_stock'] = $error;
            header("location: adminpage.php");
        }
    }
}

