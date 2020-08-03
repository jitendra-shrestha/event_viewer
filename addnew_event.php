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
                            <h5>Create new event</h5>
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
                            <form method="POST" class="form-horizontal" action='event_submit.php' enctype="multipart/form-data">
                                
                                <div class="form-group " >
                                    <label class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-4">
                                    <input type="text" name="ename" placeholder="Event Name" class="form-control" required>
                                    
                                    </div>
                                    <label class="col-sm-2 control-label">Date</label>
                                    <div class="col-sm-4"><input id="datefield" type="date" name="date" class="form-control" required></div>
                                    
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Venue</label>
                                    <div class="col-sm-4"><input type="text" name="venue" placeholder="venue" class="form-control"required></div>
                                    <label class="col-sm-2 control-label">Duration</label>
                                    <div class="col-sm-4"><input type="number" name="duration" min="1" max="12" placeholder="duration" class="form-control" required></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Start Time</label>
                                    <div class="col-sm-4"><input type="time" name="stime" placeholder="stime" class="form-control" required></div>
                                    <label class="col-sm-2 control-label">End Time</label>
                                    <div class="col-sm-4"><input type="time" name="etime" placeholder="etime" class="form-control" required></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Price</label>
                                    <div class="col-sm-4"><input type="text" name="price" placeholder="price" class="form-control" required></div>
                                    <label class="col-sm-2 control-label">Image</label>
                                    <div class="col-sm-4"><input type="file" name="image" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Attendes</label>
                                    <div class="col-sm-4"><input type="number" min="20" name="attendes" placeholder="attendes" class="form-control" required></div>
                                    <label class="col-sm-2 control-label">Days</label>
                                    <div class="col-sm-4"><input type="number" name="days" value="1" min="1" max="7" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-8"><textarea class="form-control ckeditor" name="description" required></textarea></div>
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
    <script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("datefield").setAttribute("min", today);
    </script>
