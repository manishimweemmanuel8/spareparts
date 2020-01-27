<?php 
include('session.php');

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
                    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">VSDS</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Shareholder</a></li>
                                            <li class="breadcrumb-item active">spare part</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">List spare part</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                    <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <form class="form-inline">
                                                <div class="form-group">
                                                    <label for="inputPassword2" class="sr-only">Search</label>
                                                    <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                                </div>
                                                <div class="form-group mx-sm-3">
                                                    <label for="status-select" class="mr-2">Sort By</label>
                                                    <select class="custom-select" id="status-select">
                                                        <option selected="">All</option>
                                                        <option value="1">Toyota</option>
                                                        <option value="2">Benz</option>
                                                        
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-4">
                                           
                                        </div><!-- end col-->
                                    </div> <!-- end row -->
                                </div> <!-- end card-box -->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->

                       <!-- end row-->

                        <?php if(isset($_GET['success'])){ ?>
                              <div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Successfully!</strong> Deleted</div>
                              <?php } ?>
                              <?php if(isset($_GET['error'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Something went wrong, Try again !</div>
                              <?php } ?>

                               <?php if(isset($_GET['successup'])){ ?>
                              <div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Successfully!</strong> updated</div>
                              <?php } ?>
                              <?php if(isset($_GET['errorup'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Something went wrong, Try again !</div>
                              <?php } ?>


                               <?php if(isset($_GET['successorder'])){ ?>
                              <div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Successfully!</strong> order done</div>
                              <?php } ?>
                              <?php if(isset($_GET['errororder'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Something went wrong, Try again !</div>
                              <?php } ?>

                       <div class="row">


                                <?php
                                $query = "SELECT * FROM sparepart";
                                $query = $conn->query($query);
                                $n=0;
                                while($row = $query->fetch_assoc())
                                {
                                ?> 
                                <div class="col-md-6 col-xl-3">
                                <div class="card-box product-box">

                               

                                <div>
                                  <a href="spare-part-details.php?sparepartID=<?php echo $row['sparepartID'];?>"><img src="images/<?php echo $row['sparepartView'];?>" style="height: 200px;
                                            width: 90%;" alt="product-pic" class="img-fluid" /></a>
                                </div>

                                <div class="product-info">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="font-16 mt-0 sp-line-1"><a href="ecommerce-prduct-detail.html" class="text-dark"></a><?php echo $row['sparepartModel'];?> </h5>

                                            <h5 class="font-16 mt-0 sp-line-1"><a href="ecommerce-prduct-detail.html" class="text-dark"></a><?php echo $row['sparepartName'];?> </h5>
                                        
                                        <h5 class="m-0"> <span class="text-muted"> Stocks : <?php echo $row['pieces'];?> pcs</span></h5>
                                    </div>
                                    
                                        <div class="text-dark  col" >
                                            <b>RWF <?php echo $row['sparepartPrice'];?></b>
                                        </div>

                                       
                                    
                                </div> <!-- end row -->
                                </div> <!-- end product info-->
                            <br/>
                                <div class="text-dark col">
                                           <a href="spare-part-details.php?sparepartID=<?php echo $row['sparepartID'];?>"> <button   class="btn btn-dark col">Details</button></a>
                                        </div>
                                </div> <!-- end card-box-->
                                </div> <!-- end col-->

                                <?php
                                }

                                ?>
                                </div>
                                <!-- end row-->

                       
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
        
    </body>

<!-- Mirrored from coderthemes.com/ubold/layouts/material/forms-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Aug 2019 12:27:50 GMT -->
</html>