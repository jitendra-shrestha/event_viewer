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
                            <h5>Change Password</h5>
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
                            <form method="POST" class="form-horizontal" action='user_update_password_process.php'>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Current Password </label>
                                    <div class="col-sm-4"><input type="password" name="cpassword" placeholder="Current Password" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">New password </label>
                                    <div class="col-sm-4"><input type="password" name="npassword" placeholder="New password " class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Repeat password </label>
                                    <div class="col-sm-4"><input type="password" name="rpassword" placeholder="Repeat password " class="form-control"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit" name="btn_submit" >Confirm</button>
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
     if(isset($_GET["d"])){
        $message=$_GET["d"];?>
        <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.error('', '<?php echo $message;?>');

            }, 1300);
        });
    </script>
   <?php } 
    ?>