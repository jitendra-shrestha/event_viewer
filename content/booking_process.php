<?php 
session_start();
require_once "../config.php";
if(isset($_GET['d_id'])){
    $d_id=$_GET['d_id'];
    $sqll="delete from tbl_booked_details where id='$d_id'";
    $resultt=$connect->query($sqll);
    if($resultt){
     header("location:../customer_tickets.php"."?"."de=Successfully Deleted");
    }else{
     header("location:../customer_tickets.php"."?"."de=Delete failed");
    }
}

 if(isset($_SESSION['customer_email'])){                    
        if(isset($_POST["btn_ticket"])){
            
            $event_id=$_POST['event_id'];
            $customer_id=$_POST['customer_id'];
            $price=$_POST['event_price'];
            $date=date("Y-m-d");
           
            if(empty($_POST['no_of_tickets'])){
                $no_of_tickets=1;
            }else{
                $no_of_tickets=$_POST['no_of_tickets'];
            }
            for($i=1; $i <= $no_of_tickets; $i++)
            {
                $ticketno=uniqid(); //random ticket generation
                $sql = "INSERT INTO tbl_booked_details (customer_id, event_id, ticketno , price, date)
                VALUES ('$customer_id', '$event_id', '$ticketno', '$price','$date')";
           
                mysqli_query($connect, $sql);
                   
            }
            header("location:../index.php"."?"."s=Sucessfully booked");
        }
}else{
    header("location:../signup.php"."?"."d=You have to register");
}
     
?>