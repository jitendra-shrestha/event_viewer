<?php 
session_start();
require_once 'header.php' ;
require_once 'config.php' ; ?>

<body>

<div id="wrapper">
<?php require_once 'sidebar.php'; ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Create new user</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link" href='dashboard.php'>
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="POST" class="form-horizontal" action='submit_process.php'>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">First Name </label>
                                    <div class="col-sm-4"><input type="text" name="firstname"  placeholder="First Name" class="form-control" required></div>
                                    <label class="col-sm-2 control-label">Last Name </label>
                                    <div class="col-sm-4"><input type="text" name="lastname" placeholder="Last Name" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Address </label>
                                    <div class="col-sm-4"><input type="text" name="address" placeholder="Address" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email </label>
                                    <div class="col-sm-4"><input type="email" name="email" placeholder="Email" class="form-control" required></div>
                                    <label class="col-sm-2 control-label">Mobile no </label>
                                    <div class="col-sm-4"><input type="text" name="phoneno" placeholder="Mobile no" class="form-control" required></div>
                                </div>
                             
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Username </label>
                                    <div class="col-sm-4"><input type="text" name="username" id="checkname" onkeyup="donotloadme()" placeholder="username" class="form-control" required></div>
                                    <p class="col-sm-2" id="usernamecheck"></p>
                                </div>
                                    
                                <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label">Password </label>
                                    <div class="col-sm-4"><input type="password" name="password" placeholder="password" class="form-control" required></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit" name="btn-submit" >Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</div>
 <?php  require_once 'footer.php';?>
 <?php 
     if(isset($_GET["s"])){
        $message=$_GET["s"];?>
        <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.error('<?php echo $message;?>');

            }, 1300);
        });
    </script>
   <?php } 
    ?>
