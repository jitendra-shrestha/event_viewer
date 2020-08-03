<?php 
require_once 'cust_header.php';
require_once 'config.php';
if($_SESSION['customer_email']){
    $email=$_SESSION['customer_email'];
    $check_query="SELECT * FROM tbl_customers where email='$email'";
    $result=$connect->query($check_query);
    if ($result->num_rows > 0) {
        $row=$result->fetch_assoc();
    $id=$row['id'];
?>
<!-- Breadcrumb Area Start -->
<section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(public/frontend/img/37.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="page-title">Profile</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile Edit</li>
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
                        <h4>Edit Your Profile</h4>
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
                            <form action="content/update_profile.php" method="post" >
                                <div class="contact_input_area">
                                    <div id="success_fail_info"></div>
                                    <div class="row">
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="fname" value="<?php echo $row['firstname']?>" id="name" placeholder="First Name *" required>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="lname" value="<?php echo $row['lastname']?>" id="name2" placeholder="Last Name">
                                            </div>
                                        </div>
                                         <!-- Form Group -->
                                         <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="address" value="<?php echo $row['address']?>" id="address" placeholder="Address *" required>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="phoneno" value="<?php echo $row['phone']?>" id="phone" placeholder="Your Number *" required>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $id?>" >
                                        
                                        <!-- Button -->
                                        <div class="col-12">
                                            <button type="submit" class="btn confer-btn" name="btn-submit">Update Profile <i class="zmdi zmdi-long-arrow-right"></i></button>
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
    <!-- Contact Area End -->

    <!-- body --> 
    <?php
    }
}?>



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
 if(isset($_GET["d"])){
    $message=$_GET["d"];?>
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