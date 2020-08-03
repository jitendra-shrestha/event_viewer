<?php 
session_start();
if(isset($_SESSION['username'])){
    header("location:logout.php");	
}
else{
require_once 'header.php' ;?>
<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">EV</h1>

            </div>
            <h3>Welcome to admin section</h3>

            <p>Log in </p>
            <form class="m-t" role="form" action="login_process.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" name="btn_login">Login</button>
            </form>
            <p class="m-t"> <small> &copy copyright  2019</small> </p>
        </div>
    </div>
</body>

</html>
<?php } ?>
