<?php 
session_start();
$username = $_SESSION['username'];
$type= $_SESSION['type'];
require_once 'header.php' ;
require_once 'config.php' ;
if($type=="manager")
{
    $sql="select * from tbl_events where deleted='0' order by date ASC";
}else{
    $sql="select * from tbl_events where deleted='0' and added_by='$username' order by date ASC"; 
}
$result=$connect->query($sql);
if ($result->num_rows > 0) {?>
<body>

<div id="wrapper">
    <?php require_once 'sidebar.php'; ?>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                         <div class="ibox-title">
                        <h5>Events table</h5>
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

                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Venue</th>
                                <th>Duration</th>
                                <th>Time</th>
                                <th>Days</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Attendes</th>
                                <th>Added by </th>
                                <th>Status</th>
                                <th> Action </th>
                                <th> Delete </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1; 
                            while($row = $result->fetch_assoc()) {?>
                                <tr class="gradeA">
                                <td class="center">  <?php echo $i++; ?> </td>
                                <td class="center">  <?php echo $row["name"] ?></td>
                                <td class="center">  <?php echo $row["date"] ?> </td>
                                <td class="center">  <?php echo $row["venue"] ?> </td>
                                <td class="center">  <?php echo $row["duration"] ?> </td>
                                <td class="center">  <?php echo $row["start_time"]."-".$row["end_time"] ?> </td>
                                <td class="center">  <?php echo $row["days"] ?> </td>
                                <td class="center">  <?php echo $row["price"] ?> </td>
                                <td class="center">  <img src="public/assets/events/<?php echo $row["image"]?>" height="50px" width="50px"/> </td>
                                <td class="center">  <?php echo $row["attendes"] ?> </td>
                                <td class="center">  <?php echo $row["added_by"] ?> </td>
                                <td class="center">
                                    <a data="<?php echo $row['id'];?>" class="status_checks btn
                                        <?php echo ($row['status'])?
                                        'btn-success': 'btn-danger'?>"><?php echo ($row['status'])? 'Active' : 'Deactive'?>
                                    </a>
                                </td>
                                <td class="center"> 
                                    <a href="edit_event.php?edit_event_id=<?php echo $row['id'];?>" class="btn btn-warning">Edit </a>
                                </td>
                                <td class="center"> 
                                    <a href="edit_event.php?delete_event_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"> Delete</a>
                                </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Venue</th>
                                <th>Duration</th>
                                <th>Time</th>
                                <th>Days</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Attendes</th>
                                <th>Added by </th>
                                <th>Status</th>
                                <th> Action </th>
                                <th> Delete </th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
    

        <?php 
        if($type=="manager")
        {
            $sql1="select * from tbl_events where deleted='1'";
        }else{
            $sql1="select * from tbl_events where deleted='1' and added_by='$username'";
        }
        $result1=$connect->query($sql1);
        ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                         <div class="ibox-title">
                        <h5>Past Events Table</h5>
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

                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Venue</th>
                                <th>Duration</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Attendes</th>
                                <th> Delete </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1; 
                            while($row1 = $result1->fetch_assoc()) {?>
                                <tr class="gradeA">
                                <td class="center">  <?php echo $i++; ?> </td>
                                <td class="center">  <?php echo $row1["name"] ?></td>
                                <td class="center">  <?php echo $row1["date"] ?> </td>
                                <td class="center">  <?php echo $row1["venue"] ?> </td>
                                <td class="center">  <?php echo $row1["duration"] ?> </td>
                                <td class="center">  <?php echo $row1["price"] ?> </td>
                                <td class="center">  <img src="public/assets/events/<?php echo $row1["image"]?>" height="50px" width="50px"/> </td>
                                <td class="center">  <?php echo $row1["attendes"] ?> </td>
                                <td class="center"> 
                                    <a href="edit_event.php?delete_per_event_id=<?php echo $row1['id'];?>" onclick="return confirm('Are you sure to permanently delete?')" class="btn btn-danger"> Delete</a>
                                </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Venue</th>
                                <th>Duration</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Attendes</th>
                                <th> Delete </th>
                                </tr>
                                </tfoot>
                            </table>

                    </div>
                </div>
            </div>
        
            </div>
    </div> 
   





<?php 
   
}
    
    
else {
    echo "No results";
}
?>
 
 <style>
    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
</style>

<?php  require_once 'footer.php'; ?>
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
                toastr.success('', '<?php echo $message;?>');

            }, 1300);
        });
    </script>
   <?php } 
    ?>
       <?php 
     if(isset($_GET["e"])){
        $message=$_GET["e"];?>
        <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('', '<?php echo $message;?>');

            }, 1300);
        });
    </script>
   <?php } 
    ?>

<script type="text/javascript">
$(document).on('click','.status_checks',function(){
      var status = ($(this).hasClass("btn-success")) ? '0' : '1';
      var msg = (status=='0')? 'Deactivate' : 'Activate';
      if(confirm("Are you sure to "+ msg)){
        var current_element = $(this);
        url = "ajax_events.php";
        $.ajax({
          type:"POST",
          url: url,
          data: {id:$(current_element).attr('data'),status:status},
          success: function(data)
          {   
            location.reload();
          }
        });
      }      
    });
</script>