<?php
require_once "../config.php";
if (isset($_POST["btn-submit"])){
  $firstname = mysqli_real_escape_string($connect,$_POST["fname"]);
  $lastname = mysqli_real_escape_string($connect,$_POST["lname"]);
  $address  = mysqli_real_escape_string($connect,$_POST["address"]);
  $id = mysqli_real_escape_string($connect,$_POST["id"]);
  $phoneno = mysqli_real_escape_string($connect,$_POST["phoneno"]);
//   $id=$_GET["id"];
$s="select * from tbl_customers where id =  '$id'";
$data=$connect->query($s);
$num=$data->num_rows; // it counts the number of rows affected
if($num!=0)
{
    header("location:../customer_profile.php"."?"."s=Failed to update");	
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

          if (empty($phoneno)) {
            $fla=1;
          } else {
            // check if mobile is valid or not
            if (!preg_match("/^(98|97|96)?[0-9]{8}$/",$phoneno)) {
              $fla=1;
            }
          }

            if($fla==0){
                $sql = "update tbl_customers set firstname='$firstname', lastname='$lastname', address='$address' , phone='$phoneno' where id='$id'";
            if (mysqli_query($connect, $sql)) {
            header("location:../customer_profile.php"."?"."s=Sucessfully updated");
            } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
            }
          }
          else{
            header("location:../customer_profile.php"."?"."d=Error Fields! Try Again");
          }
        }
        else{
          header("location:../customer_profile.php"."?"."d=Error!");
        }
?>
