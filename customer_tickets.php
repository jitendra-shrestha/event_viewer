<?php 
require_once 'cust_header.php';
 ?>

<div class="modal fade" id="mynotice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content customer-modal">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Terms and Conditions</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
      <div class="modal-body mx-3">
        <span class="notice-description">1. Payment should be done before three days of the event.<br></span>
        <span class="notice-description">2. If an error is made in the price of Tickets ordered by you, you will be notified by us as soon as possible. <br></span>
        <span class="notice-description">3. Once sale is completed, no exchange of tickets will be made.<br></span>
        <span class="notice-description">4. Tickets will cancelled if payment is not received at time. <br></span>
        <span class="notice-description">5. Participants should come on the mentioned time. </span>
        </div>
        
  
    </div>
  </div>
</div>


<!-- Breadcrumb Area Start -->
<section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(public/frontend/img/37.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="page-title">My Tickets</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">My Tickets</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

<!-- Our Ticket Pricing Table Area Start -->
<section class="our-ticket-pricing-table-area bg-img bg-gradient-overlay section-padding-100-0 jarallax" >
        <div class="container">
            <div class="row">
                <!-- Heading -->
                <div class="col-12">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="300ms">
                        <!-- <p>Choose a Ticket</p> -->
                        <h4>My Tickets</h4>
                    </div>
                </div>
            </div>
               
                <div class="row">
                <div class="container">
                <?php 
                require_once 'config.php' ;
                $id=$data['id'];
                if(isset($_SESSION['customer_email'])){
                $query1="SELECT tbl_events.name ,count(tbl_booked_details.ticketno) as ticket FROM tbl_events 
                INNER JOIN tbl_booked_details ON tbl_events.id = tbl_booked_details.event_id
                INNER JOIN tbl_customers ON tbl_customers.id=tbl_booked_details.customer_id where tbl_customers.id='$id'
                and tbl_events.deleted='0' group by tbl_events.name";
                $r_result=$connect->query($query1);
                $i=1;?>
                <!--Accordion wrapper-->
<div class="accordion md-accordion accordion-custom" id="accordionEx" role="tablist" aria-multiselectable="true">
               <?php foreach($r_result as $event_n) {
                 
                    ?>
          




  <!-- Accordion card -->
  <div class="card">

    <!-- Card header -->
    <div class="card-header" role="tab" id="heading<?php echo $i;?>">
      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapse<?php echo $i;?>" aria-expanded="true"
        aria-controls="collapse<?php echo $i;?>">
        <h5 class="mb-0">
        <?php echo ucwords($event_n['name']); ?> <span style="float: right;"> <?php echo "Total Tickets ( ".$event_n['ticket']." )";?> </span>
        </h5>
      </a>
    </div>

    <!-- Card body -->
    <div id="collapse<?php echo $i;?>" class="collapse" role="tabpanel" aria-labelledby="heading<?php echo $i;?>"
      data-parent="#accordionEx">
      <div class="card-body">
      <?php $ename=$event_n['name'];
                                        $query2="SELECT tbl_booked_details.date, tbl_booked_details.id as id,tbl_booked_details.price as price,tbl_booked_details.ticketno as ticket FROM tbl_events 
                                        INNER JOIN tbl_booked_details ON tbl_events.id = tbl_booked_details.event_id
                                        INNER JOIN tbl_customers ON tbl_customers.id=tbl_booked_details.customer_id 
                                        where tbl_customers.id='$id' and tbl_events.name='$ename'";
                                         $result=$connect->query($query2);

                                            $i=1;?>
                                            
                                         <table class="table table-striped table-bordered table-hover dataTables-example" style="width:100%" >
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Ticket Number</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($result as $row) {?>
                                                    <tr class="gradeA">
                                                    <td class="center"><?php  echo $i++; ?> </td>
                                                    <td class="center"><?php  echo $row['ticket']; ?> </td>
                                                    <td class="center"><?php  echo $row['price']; ?> </td>
                                                    <td class="center"><?php  echo $row['date']; ?> </td>
                                                    <td class="center"> 
                                                    <a href="content/booking_process.php?d_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"> Delete</a>
                                                    </td>
                                                    </tr>
                                                   
                    
                                                
                                               <?php } ?>
                                            </tbody>
                                        </table>
      </div>
    </div>

  </div>
  <!-- Accordion card -->

 





                <?php
                 $i++;
                 }?>
</div>
<!-- Accordion wrapper -->
                <?php
                }?>
            
           </div>
    </section>

    <section class="our-ticket-pricing-table-area bg-img bg-gradient-overlay section-padding-100-0 jarallax" >
        <div class="container">
            <div class="row">
                <!-- Heading -->
                <div class="col-12">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="300ms">
                        <!-- <p>Choose a Ticket</p> -->
                        <h4>Expired Tickets</h4>
                    </div>
                </div>
            </div>
               
                <div class="row">
                <div class="container">
                <?php 
                require_once 'config.php' ;
                $id=$data['id'];
                if(isset($_SESSION['customer_email'])){
                $query1="SELECT tbl_events.name ,count(tbl_booked_details.ticketno) as ticket FROM tbl_events 
                INNER JOIN tbl_booked_details ON tbl_events.id = tbl_booked_details.event_id
                INNER JOIN tbl_customers ON tbl_customers.id=tbl_booked_details.customer_id where tbl_customers.id='$id'
                and tbl_events.deleted='1' group by tbl_events.name";
                $r_result=$connect->query($query1);
                $k=500;?>
                <!--Accordion wrapper-->
<div class="accordion md-accordion accordion-custom" id="accordionExe" role="tablist" aria-multiselectable="true">
               <?php foreach($r_result as $event_n) {
                 
                    ?>
          




  <!-- Accordion card -->
  <div class="card">

    <!-- Card header -->
    <div class="card-header" role="tab" id="heading<?php echo $k;?>">
      <a data-toggle="collapse" data-parent="#accordionExe" href="#collapse<?php echo $k;?>" aria-expanded="true"
        aria-controls="collapse<?php echo $k;?>">
        <h5 class="mb-0">
        <?php echo ucwords($event_n['name']); ?> <span style="float: right;"> <?php echo "Total Tickets ( ".$event_n['ticket']." )";?> </span>
        </h5>
      </a>
    </div>

    <!-- Card body -->
    <div id="collapse<?php echo $k;?>" class="collapse" role="tabpanel" aria-labelledby="heading<?php echo $k;?>"
      data-parent="#accordionExe">
      <div class="card-body">
      <?php $ename=$event_n['name'];
                                        $query2="SELECT tbl_booked_details.date, tbl_booked_details.id as id,tbl_booked_details.price as price,tbl_booked_details.ticketno as ticket FROM tbl_events 
                                        INNER JOIN tbl_booked_details ON tbl_events.id = tbl_booked_details.event_id
                                        INNER JOIN tbl_customers ON tbl_customers.id=tbl_booked_details.customer_id 
                                        where tbl_customers.id='$id' and tbl_events.name='$ename'";
                                         $result=$connect->query($query2);

                                            $i=1;?>
                                            
                                         <table class="table table-striped table-bordered table-hover dataTables-example" style="width:100%" >
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Ticket Number</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($result as $row) {?>
                                                    <tr class="gradeA">
                                                    <td class="center"><?php  echo $i++; ?> </td>
                                                    <td class="center"><?php  echo $row['ticket']; ?> </td>
                                                    <td class="center"><?php  echo $row['price']; ?> </td>
                                                    <td class="center"><?php  echo $row['date']; ?> </td>
                                                    <td class="center"> 
                                                    <a href="content/booking_process.php?d_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"> Delete</a>
                                                    </td>
                                                    </tr>
                                                   
                    
                                                
                                               <?php } ?>
                                            </tbody>
                                        </table>
      </div>
    </div>

  </div>
  <!-- Accordion card -->

 





                <?php
                 $k++;
                 }?>
</div>
<!-- Accordion wrapper -->
                <?php
                }?>
            
           </div>
    </section>






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
<?php  require_once 'cust_footer.php';?>
<script>
     $(document).ready(function() {
        $(window).load(function(){        
        $('#mynotice').modal('show');
            }); 
    });
</script>
<?php 
     if(isset($_GET["de"])){
        $message=$_GET["de"];?>
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