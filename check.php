<?php
require_once "config.php";

$value = $_GET['uname']; // username

if(!empty($value)){

$s="select * from tbl_users where username =  '$value'";
$data=$connect->query($s);
$num=$data->num_rows; // it counts the number of rows affected
if($num>0)
{
   echo "<font color='red'><b >Username is already exists!!!</b></font>";
}
else
{
echo "<font color='YellowGreen'><b align='right'>Unique Username !!</b></font>";
	
}
}?>