<?php
session_start();
require_once "config.php";
if (isset($_POST["btn-submit"])){
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $address  = $_POST["address"];
  $email = $_POST["email"];
  $phoneno = $_POST["phoneno"];
  $status = $_POST["status"];

$fla=0;
        //validation starts

        if (empty($firstname)) {
            $fla=1;
          } else {
            // check if first name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
              $fla=1;
            }
          }

          if (empty($lastname)) {
            $fla=0;
          } else {
            // check if last name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
              $fla=1;
            }
          }

          if (empty($address)) {
            $fla=0;
          } else {
            // check if address only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$address)) {
              $fla=1;
            }
          }

          if (empty($email)) {
            $fla=1;
          } else {
            // check if email valid or not
            if (!preg_match("/[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,5}$/",$email)) {
              $fla=1;
            }
          }

          if (empty($phoneno)) {
            $fla=1;
          } else {
            // check if mobile is valid or not
            if (!preg_match("/^(98|97|96)?[0-9]{8}$/",$phoneno)) {
              $fla=1;
            }
          }
    $id= $_POST["id"]; 
        if($fla==0){
          $sql = "UPDATE tbl_users set firstname='$firstname', lastname='$lastname', address='$address', email='$email', phoneno='$phoneno', status='$status' where id='$id' ";
          if (mysqli_query($connect, $sql)) {
          header("location:all_users.php"."?"."s=Successfully Updated");
          } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($connect);
          }
      }else {
          header("location:edit.php"."?"."s=Error! Try Again");
      }   
               
}
else{
  header("location:dashboard.php"."?"."p=Failed"); 
}

?>
