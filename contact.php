<?php 
require_once 'cust_header.php';
require_once 'config.php';
?>
<!-- Breadcrumb Area Start -->
<section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(public/frontend/img/37.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="page-title">Contact</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

             <!-- Contact Area Start -->
<section class="contact-our-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Heading -->
                <div class="col-12">
                    <div class="section-heading-2 text-center wow fadeInUp" data-wow-delay="300ms">
                        <h4>Contact US</h4>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between">
            <div class="col-12 col-sm-2">
            </div>

                <div class="col-12 col-sm-8">
                    <!-- Contact Form -->
                    <div class="contact_from_area mb-100 clearfix wow fadeInUp" data-wow-delay="300ms">
                        <div class="contact_form">
                            <form action="content/mail.php" method="post" >
                                <div class="contact_input_area">
                                    <div id="success_fail_info"></div>
                                    <div class="row">
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="fname" id="name" placeholder="First Name *" required>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="lname"  id="name2" placeholder="Last Name">
                                            </div>
                                        </div>
                                         <!-- Form Group -->
                                         <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="address" id="address" placeholder="Address *" required>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="phoneno" id="phone" placeholder="Your Number *" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control mb-30" name="message" id="message" cols="30" rows="6" placeholder="Message *" required></textarea>
                                            </div>
                                        </div>
        
                                        
                                        <!-- Button -->
                                        <div class="col-12">
                                            <button type="submit" class="btn confer-btn" name="btn-submit">Submit <i class="zmdi zmdi-long-arrow-right"></i></button>
                                        </div>
                                    </div>
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
    <!-- Contact Us Area End -->



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