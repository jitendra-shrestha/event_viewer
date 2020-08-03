<?php 
require_once 'cust_header.php';
?>

    <!-- Welcome Area Start -->
    <section class="welcome-area">
        <div class="welcome-slides owl-carousel">
            <!-- Single Slide -->
            <div class="single-welcome-slide bg-img bg-overlay jarallax" style="background-image: url(public/frontend/img/bg-img/1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12">
                            <div class="welcome-text text-right">
                                <h2 data-animation="fadeInUp" data-delay="300ms">ANDROID<br>MEETUP</h2>
                                <h6 data-animation="fadeInUp" data-delay="500ms">Soaltee Crowne Plaza,Kathmandu</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Slide -->
            <div class="single-welcome-slide bg-img bg-overlay jarallax" style="background-image: url(public/frontend/img/45.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12">
                            <div class="welcome-text-two text-center">
                                <!-- <h5 data-animation="fadeInUp" data-delay="100ms"></h5> -->
                                <h2 data-animation="fadeInUp" data-delay="300ms">BIRTHDAY PARTY</h2>
                                <!-- Event Meta -->
                                <div class="event-meta" data-animation="fadeInUp" data-delay="500ms">
                                    <a class="event-date" href="#"><i class="zmdi zmdi-account"></i> December 06, 2019</a>
                                    <a class="event-author" href="#"><i class="zmdi zmdi-alarm-check"></i>Apin Shrestha </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Icon -->
        <div class="icon-scroll" id="scrollDown"></div>
    </section>
    <!-- Welcome Area End -->

   <?php require_once 'content/content_event.php';?>

    <?php  require_once 'cust_footer.php';?>

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
                toastr.success('<?php echo $message;?>');

            }, 1300);
        });
    </script>
   <?php } 
    ?>

    <?php 
     if(isset($_GET["lf"])){
        $message=$_GET["lf"];?>
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