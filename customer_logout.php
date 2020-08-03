<?php
session_start();
unset($_SESSION['customer_email']);
    header("location:index.php");
    setcookie("customer", "", time() - 3600);
?>