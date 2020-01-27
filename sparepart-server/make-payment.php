<?php 
include('session.php');
$user_id;



if(isset($_POST['submit']))
{

    $price = $_POST['price'];
    
    $timestamp = time()+date("Z");
    $date=$d= gmdate("Y/m/d H:i:s",$timestamp);
    $client=$user_id;
    $status="evalute";


    $file=$_FILES['image']['name'];
            
    move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $_FILES["image"]["name"]);

                                                                                                                                                                                                                                    
    $query = "INSERT INTO payment(paymentDate, paymentValue, bank_slip,client,status) VALUES ('$date', '$price','$file','$client','$status')";
    if($conn->query($query)){

        $queryu = "UPDATE order_tb SET status = 'paid', comment = 'You have paid this order, please wait until is aprooved' WHERE client= '$user_id' ";
 
        if($queryu = $conn->query($queryu)){
    
            header("Location: make-payment.php?success");
        }else {
            header("Loction: make-payment.php?error");
        }
    }else {
        header("Loction: make-payment.php?error");
    }

    
   
    }






?>


<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/ubold/layouts/material/forms-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Aug 2019 12:27:50 GMT -->
<head>
        <meta charset="utf-8" />
        <title>UBold - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include('includes/header.php'); ?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <?php include('includes/left-bar.php'); ?>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                   

                        <!-- start page title -->
                         <?php  if($_SESSION['logged_user_info_type'] == "client") {?>
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">VSDS</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Client</a></li>
                                            <li class="breadcrumb-item active">spare part payment</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Upload bank slip</h4>
                                </div>
                            </div>
                        </div>    

                        <?php
                        }?>


                        



                        <!-- end page title --> 
 
                        <?php if(isset($_GET['success'])){ ?>
                              <div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Successfully!</strong> payment went for confirmation</div>
                              <?php } ?>
                              <?php if(isset($_GET['error'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Something went wrong, Try again !</div>
                              <?php } ?>

                              <?php if(isset($_GET['successapprove'])){ ?>
                              <div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Successfully!</strong> payment Approved</div>
                              <?php } ?>
                              <?php if(isset($_GET['errorapprove'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Something went wrong, Try again !</div>
                              <?php } ?>



                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        

                                        <div class="row">
                                            <div class="col-lg-6">

                                                 <?php  if($_SESSION['logged_user_info_type'] == "client") {?>


                                                <form method="POST" enctype="multipart/form-data">

                                                    

                                                     <div class="form-group mb-3">
                                                        <label for="example-fileinput">Picture</label>
                                                        <input type="file" name="image"  class="form-control-file">
                                                    </div>

                                                     <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Submit</button>

                                                <!-- </form> -->
                                            </div> <!-- end col -->

                                            <div class="col-lg-6">
                                           <!--      <form> -->
        

                                                            <?php
                                                            $query = "SELECT * FROM order_tb where client=$user_id AND status='' ; ";
                                                            $query = $conn->query($query);
                                                            $amount=0;
                                                            $tax=0;
                                                    
                                                            while($row = $query->fetch_assoc())
                                                            {
                                                            $amount=$amount+$row['price'];
                                                            }
                                                                ?>

                                                    <div class="form-group mb-3">
                                                        <label for="example-password">Price</label>
                                                        <input type="decimal" name="price" id="example-password" class="form-control" value="<?php echo $amount; ?>" >
                                                    </div>


                                                    <button  class="btn btn-primary waves-effect waves-light">Accont Number: 5455-5454-5445</button>

                                                </form>

                                                <?php
                                            }?>




                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                       
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
                        </div><!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include('includes/footer.php'); ?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>
        
        <script>
          
         

    </body>

<!-- Mirrored from coderthemes.com/ubold/layouts/material/forms-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Aug 2019 12:27:50 GMT -->
</html>