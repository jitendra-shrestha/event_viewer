<?php
session_start();
require_once 'config.php';?> 
<?php if(isset($_POST['btn-search'])){
    $search=$_POST['search'];
    if(empty($search)){
        header("location:index.php"."?"."lf=Empty Field");
    }
    else{
    $sql="select id from 
             (SELECT id,name,venue from tbl_events where status='1' and date>curdate() and deleted='0') as t 
                where name like '%$search%' or venue like '%$search%'";
    $row_n=[];
    $result=$connect->query($sql);  
    if ($result->num_rows > 0) {
    foreach($result as $row)
    {
        $row_n[]=$row['id'];
    }
    $s=$_SESSION['try']=$row_n;

    foreach($s as $a)
    {
        echo $a."<br>";
    }
    header("location:search.php");
    }
    else{
        header("location:index.php"."?"."lf=No results");
    }
}
}
?>