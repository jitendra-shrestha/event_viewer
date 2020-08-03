<?php
session_start();
require_once 'header.php' ;
require_once 'config.php' ; 
if(isset($_GET['delete_id'])){
   $delete_id=$_GET['delete_id'];
   $sql="delete from tbl_users where id=$delete_id";
   $result=$connect->query($sql);
   if(result){
    header("location:all_users.php"."?"."s=Successfully Deleted");
   }else{
    header("location:all_users.php"."?"."s=Delete failed");
   }

}
?>