<?php 
session_start();
$username = $_SESSION['username'];
$type= $_SESSION['type'];
require_once 'header.php' ;
require_once 'config.php' ;
if(isset($_GET['delete_id'])){
    $delete_id=$_GET['delete_id'];
    $sql="delete from tbl_booked_details where id='$delete_id'";
    $result=$connect->query($sql);
    if($result){
     header("location:booking_details.php"."?"."s=Successfully Deleted");
    }else{
     header("location:booking_details.php"."?"."s=Delete failed");
    }
 
 }?>
 

 <body>

<div id="wrapper">
    <?php require_once 'sidebar.php'; ?>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Booked Details</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">

                                <?php 
                                if($type=="manager")
                                {
                                    $sql="SELECT name from tbl_events where tbl_events.status=1 and tbl_events.deleted=0 ";
                                }else{
                                    $sql="SELECT name from tbl_events where tbl_events.status=1 and tbl_events.deleted=0 and added_by='$username' ";
                                }
                                      
                                        $result=$connect->query($sql);
                                    if ($result->num_rows > 0) {
                                        $j=1;
                                        foreach($result as $row) {
                                            $eventname=$row['name'];
                                            $query1="SELECT count(tbl_booked_details.ticketno) as ticket FROM tbl_events 
                                                            INNER JOIN tbl_booked_details ON tbl_events.id = tbl_booked_details.event_id
                                                            where tbl_events.name='$eventname'
                                                            and tbl_events.deleted='0' group by tbl_events.name";
                                            $res=$connect->query($query1); 
                                            $ans=$res->fetch_assoc();  
                                            $no=$ans['ticket'];            
                                            $sql1="SELECT tbl_booked_details.id as id, 
                                                        tbl_events.name,tbl_booked_details.ticketno as ticketno, 
                                                        tbl_customers.firstname as customer,
                                                        tbl_customers.email as email,
                                                        tbl_customers.phone as phone
                                                            FROM tbl_events 
                                                            INNER JOIN tbl_booked_details ON tbl_events.id = tbl_booked_details.event_id
                                                            INNER JOIN tbl_customers ON tbl_customers.id=tbl_booked_details.customer_id 
                                                            where tbl_events.name='$eventname'";
                                            $result1=$connect->query($sql1);
                                                $i=1;  ?>


                                    <div class="panel panel-default">
                                        <div class="panel-heading panel-events">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $k=$j++;?>"><?php echo ucwords($row['name']).'('.$no.')';?></a>
                                            </h5>
                                        </div>
                                        <div id="collapse<?php echo $k;?>" class="panel-collapse collapse">

                                            
                                            <div class="panel-body">
                                               
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                <tr>
                                                <th>ID</th>
                                                <th>Customer</th>
                                                <th>Email</th>
                                                <th>Phoneno</th>
                                                <th>Ticketno</th>
                                                <th> Action </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php  foreach($result1 as $row1) {?>
                                                        <tr class="gradeA">
                                                        <td class="center">  <?php echo $i++; ?> </td>
                                                        <td class="center">  <?php echo $row1["customer"]; ?></td>
                                                        <td class="center">  <?php echo $row1["email"]; ?> </td>
                                                        <td class="center">  <?php echo $row1["phone"]; ?> </td>
                                                        <td class="center">  <?php echo $row1["ticketno"]; ?> </td>
                                                        <td class="center"> 
                                                            <a href="booking_details.php?delete_id=<?php echo $row1['id'];?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"> Delete</a>
                                                        </td>
                                                        </tr>
                                                <?php  } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                    <th>ID</th>
                                                    <th>Customer</th>
                                                    <th>Email</th>
                                                    <th>Phoneno</th>
                                                    <th>Ticketno</th>
                                                    <th> Action </th>
                                                    </tr>
                                                    </tfoot>
                                            </table>


                                            </div>
                                        </div>
                                    </div>
                                   

                                <?php
                                    }
                                    
                                
                                }else {
                                        echo "No results 2";
                                }?>




                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
               
        </div>
    </div>    

 
 
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