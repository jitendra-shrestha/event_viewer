<?php
require_once 'config.php';
extract($_POST);
$event_id=$connect->real_escape_string($id);
$status=$connect->real_escape_string($status);
$sql=$connect->query("UPDATE tbl_events SET status='$status' WHERE id='$event_id'");
echo 1;
?>
