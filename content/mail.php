<?php
require_once "../config.php";
if (isset($_POST["btn-submit"])){
  $firstname = mysqli_real_escape_string($connect,$_POST["fname"]);
  $lastname = mysqli_real_escape_string($connect,$_POST["lname"]);
  $address  = mysqli_real_escape_string($connect,$_POST["address"]);
  $phoneno = mysqli_real_escape_string($connect,$_POST["phoneno"]);
  $message = mysqli_real_escape_string($connect,$_POST["message"]);

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

          if (empty($phoneno)) {
            $fla=1;
          } else {
            // check if mobile is valid or not
            if (!preg_match("/^(98|97|96)?[0-9]{8}$/",$phoneno)) {
              $fla=1;
            }
          }

            if($fla==0){
            $sql = "INSERT INTO tbl_mail (firstname, lastname, address , phoneno, message)
                VALUES ('$firstname', '$lastname', '$address', '$phoneno', '$message')";

            if (mysqli_query($connect, $sql)) {
            header("location:../index.php"."?"."s=Sucessfully submited");
            } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
            }
          }else{
            header("location:../contact.php"."?"."lf=Error in Fields");
          }
}
else{
  header("location:../index.php"."?"."lf=Error");
}
?>
