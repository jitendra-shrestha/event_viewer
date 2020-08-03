<?php
require_once "../config.php";
if (isset($_POST["btn-submit"])){
  $firstname = mysqli_real_escape_string($connect,$_POST["fname"]);
  $lastname = mysqli_real_escape_string($connect,$_POST["lname"]);
  $address  = mysqli_real_escape_string($connect,$_POST["address"]);
  $password = md5(mysqli_real_escape_string($connect,$_POST["password"]));
  $email = mysqli_real_escape_string($connect,$_POST["email"]);
  $phoneno = mysqli_real_escape_string($connect,$_POST["phoneno"]);
//   $id=$_GET["id"];
$s="select * from tbl_customers where email =  '$email'";
$data=$connect->query($s);
$num=$data->num_rows; // it counts the number of rows affected
if($num!=0)
{
    header("location:../signup.php"."?"."s=Email already exists");	
}
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

            if($fla==0){
                echo $sql = "INSERT INTO tbl_customers (firstname, lastname, address , password, email, phone)
                VALUES ('$firstname', '$lastname', '$address', '$password', '$email', '$phoneno')";
            if (mysqli_query($connect, $sql)) {
            header("location:../index.php"."?"."s=Sucessfully registered");
            } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
            }
        }
        else{
            header("location:../index.php"."?"."lf=Try Again"); 
        }
    }
    else{
        header("location:../index.php"."?"."lf=Error"); 
    }
?>
