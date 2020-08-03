<?php
session_start();
require_once "config.php";
if (isset($_POST['btn_login']))
{
$username=$_POST['username'];
$password=md5($_POST['password']);
$check_query="select * from tbl_users where username='$username' AND password='$password'";
$result=$connect->query($check_query);
$data=$result->fetch_array();
$status=$data['status'];
if($result->num_rows==1){

$_SESSION['username']=$username;
$_SESSION['type']=$data['type'];
// $_SESSION['norm']=$usert;

	if($status=="1"){
		header("location:dashboard.php");	
		}
	else{
		header("location:login.php");	
	}
		
}
else{
	if(isset($_COOKIE['btn_login'])){
						if($_COOKIE['btn_login'] <= 3){
							$attempts = $_COOKIE['btn_login'] + 1;
							setcookie('btn_login', $attempts, time()+60*1); //set the cookie for 1 minutes with the number of attempts stored
						?><p color="red">	<?php echo "I'm sorry, but your username and password don't match.
						Please go back and enter the correct login details. You Click <a href=\"login.php\">here</a> to try again.";?> </p>
						<?php
						} else{
					?> <p color="red"> <?php echo 'You\'ve had your 3 failed attempts at
					logging in and now are banned for 1 minutes. Try again later!';?> </p>
					<?php
						}
						
					}
					
	else {
		header("location:login.php");
		setcookie('btn_login', 1, time()+60*1); //set the cookie for 1 minutes with the initial value of 1
		
		}	
		exit;
		
		
	
	}

}
?>