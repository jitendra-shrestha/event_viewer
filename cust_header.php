<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Event viewer</title>

    <!-- Favicon -->
    <link rel="icon" href="">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="public/frontend/style.css">

      <!-- Toastr style -->
      <link href="public/assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

      <link rel="stylesheet" href="public/frontend/css/datatables.min.css">
    
      

      


</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <header class="header-area">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="conferNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="index.php"><img src="public/frontend/img/logo.png" alt="Event Viewer"></a>
                    <form action="search_process.php" class="searchform" method="POST">
                    <input type="text" placeholder="Search events" name="search" class="form-control">
                    <button type="submit" name="btn-search"><i class="fa fa-search"></i></button>
                    </form>
                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                        
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                       
                        <div class="classynav">
                        
                            <ul id="nav">
                                <li class="active"><a href="index.php">Home</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <li><a href="" data-toggle="modal" data-target="#ndj">About Us</a></li>
                                
                            
                            
                            <?php 
                            session_start();
                            if(isset($_SESSION['customer_email'])){
                                 $customer=$_SESSION['customer_email'];
                                 require_once "config.php";
                                $query="select * from tbl_customers where email='$customer'";
                                $result=$connect->query($query);
                                $data=$result->fetch_array();
                                $username=$data['firstname'];
                                 ?>
                                <li><a href="#"><i class="fa fa-user"></i><?php echo "  ".$username;?></a>
                                    <ul class="dropdown">
                                        <li><a href="customer_profile.php">Edit Profile</a></li>
                                        <li><a href="customer_tickets.php">My Tickets</a></li>
                                        <li><a href="customer_logout.php">Log Out</a></li>
                                    </ul>
                                </li>
                                
                            <?php }?>
                            </ul>
                            <?php if(!isset($_SESSION['customer_email'])){?>
                            <!--  Button -->
                            <a href="signup.php" class="confer-btn mt-3 mt-lg-0 ml-3 ml-lg-5">Signup </a>
                            <a href=""  class="confer-btn mt-3 mt-lg-0 ml-3 ml-lg-5" data-toggle="modal" data-target="#modalLoginForm">Login </a>
                        <?php }?>
                            </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header Area End -->


<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content login-form">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold login-form-title">Log In</h4>
        <button type="button" class="close login-form-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="content/customer_login_process.php">
      <div class="modal-body mx-3">
        <div class="md-form ">
            <div class="form-group">
                <input type="email" class="form-control mb-30" name="email" id="email" placeholder="E-mail " required>
            </div>
            <div class="form-group">
                    <input type="password" class="form-control mb-30" name="password"  placeholder="Your Password " required>
            </div>
            </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <button type="submit" class="btn confer-btn" name="btn_login">Log In <i class="zmdi zmdi-long-arrow-right"></i></button>
        </div>
    </form>
    </div>
  </div>
</div>