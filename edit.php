<?php
session_start();
require_once 'header.php' ;
require_once 'config.php' ; 
if(isset($_GET['edit_id'])){
   $id=$_GET['edit_id'];
?>
<body>
<div id="wrapper">
<?php require_once 'sidebar.php'; 
$sql="select * from tbl_users where id=$id";
$result=$connect->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
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
                            <form method="POST" class="form-horizontal" action='user_update_process.php'>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">First Name </label>
                                    <div class="col-sm-4"><input type="text" name="firstname" value="<?php echo $row['firstname'] ?>" class="form-control" required></div>
                                    <label class="col-sm-2 control-label">Last Name </label>
                                    <div class="col-sm-4"><input type="text" name="lastname" value="<?php echo $row['lastname'] ?>" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Address </label>
                                    <div class="col-sm-4"><input type="text" name="address" value="<?php echo $row['address'] ?>" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email </label>
                                    <div class="col-sm-4"><input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" required></div>
                                    <label class="col-sm-2 control-label">Phone no </label>
                                    <div class="col-sm-4"><input type="text" name="phoneno" value="<?php echo $row['phoneno'] ?>" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Status </label>
                                    <div class="form-group">
                                        <div class="col-sm-4">

                                         <div class="radio i-checks"><label> <input type="radio" value="1" name="status" <?php echo($row['status']==1)? "checked":""; ?>> <i></i>Active </label></div>
                                        <div class="radio i-checks"><label> <input type="radio" value="0" name="status" <?php echo($row['status']==0)? "checked":""; ?> > <i></i> Deactive</label></div>
                                        </div>
    
                                </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit" name="btn-submit" >Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
            <?php
            }
            else{
                    echo "No content";
            }
} 
else{
    header("location:dashboard.php"."?"."p=Failed"); 
}?>
</div>
 <?php  require_once 'footer.php';?>