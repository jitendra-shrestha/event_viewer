<?php
require_once "../config.php";
if (isset($_POST['btn_login']))
{
$email=$connect->real_escape_string($_POST['email']);
$password=$connect->real_escape_string(md5($_POST['password']));
$query="select * from tbl_customers where email='$email' and password='$password'";
$result=$connect->query($query);
$data=$result->fetch_array();
$status=$data['status'];

if($result->num_rows==1){
        if($status=="1"){
            session_start();
            $_SESSION['customer_email']=$email;
            header("location:../index.php");	
            }
        else{
            header("location:../index.php"."?"."lf=Your account is disabled !");	
        }
            
    }
    else{
        header("location:../index.php"."?"."lf=Invalid credentials !");
    }
}
?>