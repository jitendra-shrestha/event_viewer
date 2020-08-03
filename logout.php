<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['type']);
    header("location:login.php");
    setcookie("user", "", time() - 3600);
?>