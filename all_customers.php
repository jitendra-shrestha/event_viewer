<?php 
session_start();
require_once 'header.php' ;
require_once 'config.php' ;
if(isset($_GET['delete_id'])){
    $delete_id=$_GET['delete_id'];
    $sql="delete from tbl_customers where id=$delete_id";
    $result=$connect->query($sql);
    if(result){
     header("location:all_customers.php"."?"."s=Successfully Deleted");
    }else{
     header("location:all_customers.php"."?"."s=Delete failed");
    }
 
 }
$sql="select * from tbl_customers";
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
                        <h5>Customers tables</h5>
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
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phoneno</th>
                                <th>Status</th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1; 
                            while($row = $result->fetch_assoc()) {?>
                                <tr class="gradeA">
                                <td class="center">  <?php echo $i++; ?> </td>
                                <td class="center">  <?php echo $row["firstname"] ?></td>
                                <td class="center">  <?php echo $row["lastname"] ?> </td>
                                <td class="center">  <?php echo $row["address"] ?> </td>
                                <td class="center">  <?php echo $row["email"] ?> </td>
                                <td class="center">  <?php echo $row["phone"] ?> </td>
                                <td>
                                    <a data="<?php echo $row['id'];?>" class="status_checks btn
                                        <?php echo ($row['status'])?
                                        'btn-success': 'btn-danger'?>"><?php echo ($row['status'])? 'Active' : 'Deactive'?>
                                    </a>
                                </td>
                                <td class="center"> 
                                    <a href="all_customers.php?delete_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"> Delete</a>
                                </td>
                                
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>ID</th>
                                <th>Firstname</th>
                                <th>lastname</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phoneno</th>
                                <th>Status</th>
                                <th> Action </th>
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

<script type="text/javascript">
$(document).on('click','.status_checks',function(){
      var status = ($(this).hasClass("btn-success")) ? '0' : '1';
      var msg = (status=='0')? 'Deactivate' : 'Activate';
      if(confirm("Are you sure to "+ msg)){
        var current_element = $(this);
        url = "ajax_customers.php";
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