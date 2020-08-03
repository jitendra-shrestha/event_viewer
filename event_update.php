<?php
session_start();
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
    $status = mysqli_real_escape_string($connect,$_POST["status"]);
    $start_time = mysqli_real_escape_string($connect,$_POST["stime"]);
    $end_time = mysqli_real_escape_string($connect,$_POST["etime"]);
    $days = mysqli_real_escape_string($connect,$_POST["days"]);
    $id= $_POST["id"];   

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

          if ($end_time<$start_time) {
            $fla=1;
          }

          echo $fla;
    if($fla==0)
    {
    $sql="select * from tbl_events where id=$id";
    $result=$connect->query($sql);
    $data=$result->fetch_array();
    if($data['image']){
    $path="public/assets/events/".$data['image'];
    unlink($path);
    }

    $imagetype = stripslashes($_FILES["image"]["type"]);
    if(substr($imagetype,0,5)=="image")
    {
      $query = "UPDATE tbl_events set name='$name', date='$date', venue='$venue', price='$price', description='$description', duration='$duration', status='$status', attendes='$attendes' ,start_time='$start_time', end_time='$end_time', days='$days' where id='$id' ";
      $connect->query($query);
//   $insert_id  = mysqli_insert_id($connect); //1
  $fname_old = $_FILES['image']['name']; //img.jpg
  echo $ext = pathinfo($fname_old,PATHINFO_EXTENSION); // EXTENSION OF THE FILE
  
  $fname_new = $name."_events_update_".$id."_pic.".$ext;
  if(move_uploaded_file($_FILES['image']['tmp_name'],"public/assets/events/".$fname_new))
      {
              $query2 = "update tbl_events set image = '$fname_new' where id='$id'";
        $res = mysqli_query($connect,$query2);
        header("location:all_events.php"."?"."s=Successfully Updated");
      }
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
    }
  }
  else{
      header("location:all_events.php"."?"."e=Update Failed");
  }
}
else{
  header("location:all_events.php"."?"."e=Failed");
}

?>