<?php
session_start();
require_once "config.php";
if (isset($_POST["btn_submit"])){
    $check_username=$_SESSION['username'];
    var_dump($check_username);
    $cpassword=md5($_POST["cpassword"]);
    $npassword=$_POST["npassword"];
    $rpassword=$_POST["rpassword"];
    $sql="SELECT * FROM tbl_users where username='$check_username'";
    $result=$connect->query($sql);
    if ($result->num_rows > 0) {
        $row=$result->fetch_assoc();
    $id=$row['id'];
    $password=$row['password'];
    if($password==$cpassword){
        if($npassword==$rpassword){
            $npassword=md5($_POST["npassword"]);
            $sql1="UPDATE tbl_users SET password='$npassword' WHERE id='$id'";
            $result=$connect->query($sql1);
            if($result){
                header("location:dashboard.php"."?"."p=Password changed");
            }
            else{
                header("location:change_password.php"."?"."d=Password change failed");
            }
        }
        else{
            header("location:change_password.php"."?"."d=confirm password doesnt match");
        }
    }else{
        header("location:change_password.php"."?"."d=Current password doesnt match");
    }
}
else{
    die("no results");
}
}
?>