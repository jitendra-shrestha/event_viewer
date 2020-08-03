<?php 
require_once 'config.php' ;
require_once 'cust_header.php';?>

<!-- Breadcrumb Area Start -->
<section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(public/frontend/img/37.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="page-title">SEARCH</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Search</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End --> 

    <!-- Our Ticket Pricing Table Area Start -->
    <section class="our-ticket-pricing-table-area bg-img bg-gradient-overlay section-padding-100-0 jarallax" style="background-image: url(img/bg-img/14.jpg);">
        <div class="container">
            <div class="row">
                <!-- Heading -->
                <div class="col-12">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="300ms">
                        <!-- <p>Choose a Ticket</p> -->
                        <h4>Search Results</h4> 
                    </div>
                </div>
            </div>
                
            <div class="row">
                   <!-- Single Ticket Pricing Table -->

                <?php $s=$_SESSION['try'];
                       $i=1;  
                // define how many results you want per page
                $results_per_page = 3;
                // find out the number of results stored in database
                $number_of_results = count($s);
                // determine number of total pages available
                $number_of_pages = ceil($number_of_results/$results_per_page);
                // determine which page number visitor is currently on
                if (!isset($_GET['page'])) {
                $page = 1;
                } else {
                $page = $_GET['page'];
                }
                // determine the sql LIMIT starting number for the results on the displaying page
                $this_page_first_result = ($page-1)*$results_per_page;
                // retrieve selected results from database and display them on page
                foreach($s as $a)
                   { 
                $sql="select * from tbl_events where id='$a' order by date ASC LIMIT " . $this_page_first_result . ',' .  $results_per_page;
                    // $sql="select * from tbl_events where id='$a'";
                $result = mysqli_query($connect, $sql); ?>

                   <?php  while($row = $result->fetch_assoc()) {?>

                    <div class="col-12 col-lg-4">
                    <div class="single-ticket-pricing-table text-center mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <h6 class="ticket-plan"> EVENT <?php echo $i++?></h6>
                        <!-- Ticket Icon -->
                        <div class="ticket-icon">
                        <a href="description.php?id=<?php echo $row['id'];?>"><img src="public/assets/events/<?php echo $row["image"]?>"/></a>
                        </div>
                        <h2 class="ticket-price"><span><?php
                         if($row['price']!="free")
                         {
                             echo "$";
                         }?>
                         </span><?php echo strtoupper($row['price']);?></h2>
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
                        
                        <?php 
                                    $event_id=$row['id'];
                                    $query4="select * from tbl_booked_details where event_id='$event_id'";
                                    $result4=$connect->query($query4);
                                    $num_rows = $result4->num_rows;
                                    $attended=$num_rows;
                        ?>


                   <div class="ticket-pricing-table-details">
                   <p><strong><?php echo strtoupper($row['name']);?></strong></p>
                   <p>Date:<?php echo " ".$row['date'];?></p>
                   <p>Venue:<?php echo  " ".ucwords($row['venue']);?></p>
                   <p>Price:<?php echo  " $".strtoupper($row['price']);?></p>
                   <p>Ticket sold:<?php echo " "."$attended"?></p>
                   </div>

                   </div>
                </div>

                <?php }}?>

                </div>
    </section>
    <!-- Our Ticket Pricing Table Area End --> 

<?php require_once 'cust_footer.php';?>


          
            
          
             
        
        
               
 
