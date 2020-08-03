<?php 
$username = $_SESSION['username'];
$type= $_SESSION['type'];
?>
<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="public/assets/img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo strtoupper($username); ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo strtoupper($type); ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="change_password.php">Change Password</a></li>
                               
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            EV
                        </div>
                    </li>
                    <li>
                        <a href="dashboard.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> </a>
                    </li>
                   
                    <?php if($type=="manager")
                    {?>
                    <li>
                        <a href="all_users.php"><i class="fa fa-users"></i> <span class="nav-label">All Users</span></a>
                    </li>
                    <li>
                    <a href="addnew_user.php"><i class="fa fa-user-plus"></i> <span class="nav-label">Add New User</span></a>
                    </li>
                    <li>
                        <a href="all_customers.php"><i class="fa fa-users"></i> <span class="nav-label">Customers</span></a>
                    </li>
                    <?php }?>
                    <li>
                    <a href="all_events.php"><i class="fa fa-tasks"></i> <span class="nav-label">All events</span></a>
                    </li>
                    <li>
                    <a href="addnew_event.php"><i class="fa fa-tasks"></i> <span class="nav-label">Add New event</span></a>
                    </li>
                    <li>
                        <a href="booking_details.php"><i class="fa fa-calendar"></i> <span class="nav-label">Booked Details</span></a>
                    </li>
                   
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Hello  <?php echo strtoupper($username) ?></span>
                </li>               
                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>