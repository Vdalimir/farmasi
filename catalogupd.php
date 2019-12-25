<?php
include "db.php";
session_start();

$error = "";

if (isset($_POST["updateCat"])) {
    $id = $_POST['id'];
    $dwn_url = $_POST['dwn_url'];

    if ($_FILES['file']['name'] != null) {
        $target_dir = "img/";

        $target_file_name = basename($_FILES["file"]["name"]);

        $target_file = $target_dir . $target_file_name;

        if (file_exists($target_file)) {
            $rawBaseName = pathinfo($target_file_name, PATHINFO_FILENAME);
            $extension = pathinfo($target_file_name, PATHINFO_EXTENSION);
            $counter = 0;
            while (file_exists($target_file)) {
                $target_file_name = $rawBaseName . $counter . '.' . $extension;
                $target_file = $target_dir . $target_file_name;
                $counter++;
            };
        }
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            if (($check[2] !== IMAGETYPE_GIF) && ($check[2] !== IMAGETYPE_JPEG)
                && ($check[2] !== IMAGETYPE_BMP) && ($check[2])
                && ($check[2] !== IMAGETYPE_PNG)) {
                $error = "Файл не является иображением (возможные форматы JPEG, PNG, GIF, BMP)";
                $_SESSION['error_cat'] = $error;
                header("location: adminpage.php");
            }
        } else {
            $error = "Файл пуст или не является иображением (возможные форматы JPEG, PNG, GIF, BMP)";
            $_SESSION['error_cat'] = $error;
            header("location: adminpage.php");
        }

        if (empty($error)) {
            if ($dwn_url != null) {
                $sql_cat = "UPDATE catalog SET download_url = '$dwn_url', img_dir = '$target_file' WHERE id = '$id'";

                if ($link->query($sql_cat) === TRUE) {
                    unlink($_POST['img_dir']);
                    move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
                    $_SESSION['result_cat'] = "Каталог успешно обновлён";
                    header("location: adminpage.php");
                } else {
                    $error = "Error: " . $sql_cat . "<br>" . $link->error;
                    $_SESSION['error_cat'] = $error;
                    header("location: adminpage.php");
                }
            } else {
                $error = "Заполните все поля";
                $_SESSION['error_cat'] = $error;
                header("location: adminpage.php");
            }
        }
    } else {
        if ($dwn_url) {
            $sql_cat = "UPDATE catalog SET download_url = '$dwn_url' WHERE id = '$id'";

            if ($link->query($sql_cat) === TRUE) {
                $_SESSION['result_cat'] = "Каталог успешно обновлён";
                header("location: adminpage.php");
            } else {
                $error = "Error: " . $sql_cat . "<br>" . $link->error;
                $_SESSION['error_cat'] = $error;
                header("location: adminpage.php");
            }
        } else {
            $error = "Заполните все поля";
            $_SESSION['error_cat'] = $error;
            header("location: adminpage.php");
        }
    }
}