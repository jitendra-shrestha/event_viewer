<?php
$servername = "localhost";
$user_root = "root";
$password_root = "";
$database = "event";

// Create connection
$connect = mysqli_connect($servername, $user_root, $password_root, $database);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?> 