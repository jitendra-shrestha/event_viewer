<?php
require_once 'config.php';
extract($_POST);
$user_id=$connect->real_escape_string($id);
$status=$connect->real_escape_string($status);
$sql=$connect->query("UPDATE tbl_users SET status='$status' WHERE id='$id'");
echo 1;
?>
