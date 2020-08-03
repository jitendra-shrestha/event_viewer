<?php 
require_once 'cust_header.php';
require_once 'config.php' ;
$event_id=$_GET['id'];
$sql="select * from tbl_events where id='$event_id'";
$result=$connect->query($sql);
if ($result->num_rows > 0) {

foreach($result as $row){ ?>
    <!-- Contact Area Start -->
<section class="contact-our-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Heading -->
                <div class="col-12">
                    <div class="section-heading-2 text-center wow fadeInUp" data-wow-delay="300ms">
                        <p></p>
                        <h4><?php echo $row['name']?></h4>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between">
            <div class="col-sm-2">
            </div>

                <div class="col-sm-8">
                    <!-- Contact Form -->
                    <div class="contact_from_area mb-100 clearfix wow fadeInUp" data-wow-delay="300ms">
                        <div class="contact_form">
                                <div class="contact_input_area">
                                    <div id="success_fail_info"></div>
                                    <div class="row">
                                    <img src="public/assets/events/<?php echo $row["image"]?>" height="300px" width="800px"/> 
                                    </div>
                                   
                                    <div class="container single-event">
                                        <div class="single-event-description">
                                        <?php echo ucfirst($row["description"]); ?>
                                        </div>
                                 
                                        <div class="row">
                                            <div class="col-sm">
                                            <p><span class="single-event-common">Date : </span><?php echo " ".$row['date'];?></p>
                                            </div> 
                                            <div class="col-sm">
                                            <p><span class="single-event-common">Days : </span><?php echo " ".$row['days'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm">
                                            <p><span class="single-event-common">Time : </span><?php echo " ".$row['start_time']."-".$row['end_time'];?></p>
                                            </div>
                                            <div class="col-sm">
                                            <p><span class="single-event-common">Duration : </span><?php echo " ".$row['duration']."hrs";?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm">
                                            <p><span class="single-event-common">Total Seats : </span><?php echo " ".$row['attendes'];?></p>
                                            </div>
                                            <div class="col-sm">
                                            <p><span class="single-event-common">Venue : </span><?php echo  " ".ucwords($row['venue']);?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm">
                                            <p><span class="single-event-common">Price : </span><?php echo  " $".strtoupper($row['price']);?></p>
                                            </div>
                                            <div class="col-sm">
                                           
                                            </div>
                                        </div>
                                    </div>
                             
                                       
                                       
                                        <?php 
                            if(isset($_SESSION['customer_email'])){
                                    $event_id=$row['id'];
                                    $customer=$_SESSION['customer_email'];
                                    $query="select * from tbl_customers where email='$customer'";
                                    $result1=$connect->query($query);
                                    $data=$result1->fetch_array();
                                    $customer_id=$data['id'];

                                    $ticket=uniqid(); //random ticket generation

                                    $query2="select * from tbl_events where id='$event_id'";
                                    $result2=$connect->query($query2);
                                    $data=$result2->fetch_array();
                                    $maxattendes=$data['attendes'];

                                    $query3="select * from tbl_booked_details where event_id='$event_id'";
                                    $result3=$connect->query($query3);
                                    $num_rows = $result3->num_rows;
                                    $attended=$num_rows;

                                    $remaining=$maxattendes-$attended;
                        ?>
                         
                         <?php
                         if($remaining!=0){ ?>
                         <form method="POST" action="content/booking_process.php">
                            <input type=number name="no_of_tickets" class="form-control mb-30" placeholder="No of tickets" min="1" max="<?php echo $remaining?>"> 
                            <input type="hidden" value="<?php echo $customer_id?>" name="customer_id">
                            <input type="hidden" value="<?php echo $event_id?>" name="event_id">
                            <input type="hidden" value="<?php echo $row['price']?>" name="event_price">
                            <button type="submit" name="btn_ticket" class="confer-btn w-100 mb-30">Get Tickets <i class="zmdi zmdi-long-arrow-right"></i></button>
                            </form>
                         <?php
                         }else{?>

                            <input disabled type=number name="no_of_tickets" class="form-control mb-30" placeholder="SEAT FULL" > 
                            <button onclick="location.href='contact.php'" class="confer-btn w-100 mb-30">Contact Us<i class="zmdi zmdi-long-arrow-right"></i></button>
                         <?php
                        }
                    }else{?>
                        <form method="POST" action="content/booking_process.php">
                        <button type="submit" name="btn_ticket" class="confer-btn w-100 mb-30">Get Tickets <i class="zmdi zmdi-long-arrow-right"></i></button>
                        </form>
                    <?php }
                        ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-2">
            </div>

            </div>
        </div>
    </section>
    <!-- Contact Area End -->

    <!-- body --> 
<?php } }
?>




    <?php  require_once 'cust_footer.php';?>

<?php 
 if(isset($_GET["s"])){
    $message=$_GET["s"];?>
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
            toastr.error('<?php echo $message;?>');

        }, 1300);
    });
</script>
<?php } 
?>
<?php 
 if(isset($_GET["d"])){
    $message=$_GET["d"];?>
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