<?php 
require_once 'header.php' ;
require_once 'config.php' ;
$sql="SELECT * from tbl_mail ORDER BY id DESC";
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
                        <h5>List of Feedback</h5>
                          </div>
                            <div class="ibox-content">

                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone no</th>
                                <th>Message</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1; 
                            while($row = $result->fetch_assoc()) {?>
                                <tr class="gradeA">
                                <td class="center">  <?php echo $i++; ?> </td>
                                <td class="center">  <?php echo $row["firstname"].$row["lastname"];?></td>
                                <td class="center">  <?php echo $row["address"] ?> </td>
                                <td class="center">  <?php echo $row["phoneno"] ?> </td>
                                <td class="center">  <?php echo $row["message"] ?> </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone no</th>
                                <th>Message</th>
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