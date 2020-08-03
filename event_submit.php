<?php
session_start();
$username = $_SESSION['username'];
require_once "config.php";
if (isset($_POST["btn-submit"])){
  $name = mysqli_real_escape_string($connect,$_POST["ename"]);
  $date = mysqli_real_escape_string($connect,$_POST["date"]);
  $venue  = mysqli_real_escape_string($connect,$_POST["venue"]);
  $price = mysqli_real_escape_string($connect,$_POST["price"]);
  $im = $_FILES['image']['name'];
  $description=mysqli_real_escape_string($connect,$_POST["description"]);
  $attendes=mysqli_real_escape_string($connect,$_POST["attendes"]);
  $duration=mysqli_real_escape_string($connect,$_POST["duration"]);
  $etime=mysqli_real_escape_string($connect,$_POST["etime"]);
  $stime=mysqli_real_escape_string($connect,$_POST["stime"]);
  $days=mysqli_real_escape_string($connect,$_POST["days"]);

  
//   $imagename = stripslashes($_FILES["image"]["name"]);
//   $imagedata = stripslashes(file_get_contents($_FILES["image"]["temp_name"]));
//   $folder="assets/img/";

$fla=0;
        //validation starts

        if (empty($name)) {
            $fla=1;
          } else {
            // check if event name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
              $fla=1;
            }
          }

          if ($etime<$stime) {
            $fla=1;
          }

if($fla==0)
{
  $imagetype = stripslashes($_FILES["image"]["type"]);
  if(substr($imagetype,0,5)=="image")
  {
    $query = "insert into tbl_events values(NULL,'$name', '$date', '$venue','$stime', '$etime', '$days','$duration', '$price','$im', '$attendes','$description','$username','','')";
    $connect->query($query);
$insert_id  = mysqli_insert_id($connect); //1
$fname_old = $_FILES['image']['name']; //img.jpg
echo $ext = pathinfo($fname_old,PATHINFO_EXTENSION); // EXTENSION OF THE FILE

$fname_new = $name."_events_".$insert_id."_pic.".$ext;
if(move_uploaded_file($_FILES['image']['tmp_name'],"public/assets/events/".$fname_new))
	{
			$query2 = "update tbl_events set image = '$fname_new' where id='$insert_id'";
      $res = mysqli_query($connect,$query2);
			header("location:all_events.php"."?"."s=Sucessfully added");
	}
        }
      }
      else{
        header("location:all_events.php"."?"."e=Insert Failed");
           }
    }
        else{
          header("location:addnew_event.php"."?"."e=Failed");
        }

?>
