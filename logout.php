<?php
session_start();
unset($_SESSION['user_name']);
unset($_SESSION['loggedIn']);
session_destroy();
header("location: login.php");