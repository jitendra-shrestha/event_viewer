<?php 
session_start();
require_once 'header.php';
if (!isset($_SESSION['username']))
{
    header("location:login.php");
}
$type= $_SESSION['type'];
?>
<body>
    <div id="wrapper">
        <?php require_once 'sidebar.php'; ?>


        <div class="row  border-bottom white-bg dashboard-header">

                    <div class="col-sm-12">
                    
                    </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content">
                <div class="row">
                <?php if($type=="manager")
                                    {?>
                        <div class="col-lg-2">
                            <div class="ibox float-e-margins">
                            
                                <div class="ibox-title">
                                    <h5>Total Customer</h5> <span class="label label-primary"></span>  
                                </div>
                                <div class="ibox-content" style="display: block;">
                                <?php 
                                require_once 'config.php' ;
                               $sql="SELECT * from tbl_customers";
                               $result=$connect->query($sql);
                               $num_rows = $result->num_rows;
                                echo "$num_rows";?>
                                </div>
                                   
                        
                            </div>
                          
                        </div>
                        <?php } ?>
                        
                        <div class="col-lg-12">
                                <div class="ibox-content" style="display: block;">
                                <?php 
                                require_once 'all_message.php' ;
                                ?>
                            </div>
                        </div>
                     
                          
                </div>

                </div>


            
            </div>
        </div>

        </div>
    </div>
 

   <?php  require_once 'footer.php';?>

   <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('', 'WELCOME');

            }, 1300);
        });
    </script>

    <?php 
     if(isset($_GET["p"])){
        $message=$_GET["p"];?>
        <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    positionClass:'toast-bottom-left',
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.warning('<?php echo $message;?>');

            }, 1300);
        });
    </script>
   <?php } 
    ?>