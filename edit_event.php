<?php
session_start();
require_once 'header.php' ;
require_once 'config.php' ; 
if(isset($_GET['edit_event_id'])){
   $id=$_GET['edit_event_id'];
}
if(isset($_GET['delete_event_id'])){
   $delete_id=$_GET['delete_event_id'];
   $s="update tbl_events set deleted='1' where id=$delete_id";
   $results=$connect->query($s);
   if(results){
    header("location:all_events.php"."?"."s=Successfully Deleted");
   }else{
    header("location:all_events.php"."?"."s=Delete failed");
   }

}
if(isset($_GET['delete_per_event_id'])){
    $delete_id=$_GET['delete_per_event_id'];
    $sql="select * from tbl_events where id=$delete_id";
    $result=$connect->query($sql);
    $data=$result->fetch_array();
    $path="public/assets/events/".$data['image'];
    unlink($path);
 
    $s="delete from tbl_events where id=$delete_id";
    $results=$connect->query($s);
    if(results){
     header("location:all_events.php"."?"."s=Successfully Deleted");
    }else{
     header("location:all_events.php"."?"."s=Delete failed");
    }
 
 }
?>
<body>
<div id="wrapper">
<?php require_once 'sidebar.php'; 
$sql="select * from tbl_events where id=$id";
$result=$connect->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Edit event</h5>
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

                            <form method="POST" class="form-horizontal" action='event_update.php' enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                                <div class="form-group " >
                                    <label class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-4">
                                    <input type="text" name="ename" value="<?php echo $row['name'] ?>" class="form-control">
                                    
                                    </div>
                                    <label class="col-sm-2 control-label">Date</label>
                                    <div class="col-sm-4"><input type="date" name="date" value="<?php echo $row['date'] ?>"  class="form-control"></div>
                                    
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Venue</label>
                                    <div class="col-sm-4"><input type="text" name="venue" value="<?php echo $row['venue'] ?>" class="form-control"></div>
                                    <label class="col-sm-2 control-label">Duration</label>
                                    <div class="col-sm-4"><input type="text" name="duration" value="<?php echo $row['duration'] ?>" class="form-control"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Start Time</label>
                                    <div class="col-sm-4"><input type="time" name="stime" value="<?php echo $row['start_time']?>" class="form-control"></div>
                                    <label class="col-sm-2 control-label">End Time</label>
                                    <div class="col-sm-4"><input type="time" name="etime" value="<?php echo $row['end_time']?>" class="form-control"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">price</label>
                                    <div class="col-sm-4"><input type="text" name="price" value="<?php echo $row['price'] ?>" class="form-control"></div>
                                    <label class="col-sm-2 control-label">Image</label>
                                    <div class="col-sm-4"><input type="file" name="image" data-default-file="public/assets/events/<?php echo $row['image'] ?>" class="form-control dropify"  required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Attendes</label>
                                    <div class="col-sm-4"><input type="number" min="20" name="attendes" value="<?php echo $row['attendes'] ?>" class="form-control"></div>
                                    <label class="col-sm-2 control-label">Days</label>
                                    <div class="col-sm-4"><input type="number" name="days" value="<?php echo $row['days'] ?>" min="1" max="7" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-8"><textarea class="form-control ckeditor"  name="description"><?php echo $row['description'] ?></textarea></div>
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
            }?>
</div>
 <?php  require_once 'footer.php';?>

    <!-- dropify -->
    <script src="public/assets/js/plugins/dropify/js/dropify.js"></script>
   
   
 <script>
     jQuery(document).ready(function() {
        $('.dropify').dropify();
        });
   
 </script>