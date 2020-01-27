<?php 
include('session.php');

$user_id;

if(isset($_GET['status']))
{
   
    $sId = $_GET['status'];
  
    $query = "delete from sparepart where sparepartID= $sId";
 
    if($query = $conn->query($query)){
        header("Location: view-spare-part.php?success");
    } else {
        header("Location: view-spare-part.php?error");
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
                    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <?php  if($_SESSION['logged_user_info_type'] == "shareholder") {?>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">VSDS</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Shareholder</a></li>
                                            <li class="breadcrumb-item active">spare part</li>
                                        </ol>
                                    </div>
                                    <?php
                                }
                                ?>

                                  <?php  if($_SESSION['logged_user_info_type'] == "client") {?>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">VSDS</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Client</a></li>
                                            <li class="breadcrumb-item active">spare part</li>
                                        </ol>
                                    </div>
                                    <?php
                                }
                                ?>
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
                                        <div class="form-inline">
                                            <form class="form-inline">
                                                <div class="form-group">
                                                    <label class="sr-only">Search</label>
                                                    <input type="search" class="form-control" name="search" id="inputPassword2" placeholder="Search...">
                                                </div>
                                              
                                                <div class="text-lg-right mt-3 mt-lg-0" style="float: left">
                                                <button type="submit" class="btn btn-warning waves-effect waves-light"><i class=""></i> Search</button>
                                            </div>
                                            </form>
                                            <form class="form-inline">
                                                <div class="form-group mx-sm-3">
                                                    <!-- <label for="status-select" class="mr-2">Sort By</label> -->
                                                    <select class="custom-select" id="status-select" name="model">
                                                        <option selected="">All</option>
                                                        <option value="toyota">Toyota</option>
                                                        <option value="benz">Benz</option>
                                                        <option value="jeep">jeep</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="text-lg-right mt-3 mt-lg-0" style="float: left">
                                                <button type="submit" class="btn btn-warning waves-effect waves-light"><i class=""></i> Search model</button>
                                            </div>
                                            </form>
                                        </div>
                                        </div>

                                        <?php  if($_SESSION['logged_user_info_type'] == "shareholder") {?>
                                        <div class="col-lg-4">
                                            <div class="text-lg-right mt-3 mt-lg-0">
                                                <a href="upload-spare-part.php" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-plus-circle mr-1"></i> Add New</a>
                                            </div>
                                        </div><!-- end col-->

                                       
                                           
                                        
                                        <?php } ?>
                                         <?php  if($_SESSION['logged_user_info_type'] == "client") {?>
                                        <div class="col-lg-4">
                                            <div class="text-lg-right mt-3 mt-lg-0">
                                                <a href="review-order.php" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-plus-circle mr-1"></i> Review Order</a>
                                            </div>
                                        </div><!-- end col-->

                                        <?php } ?>

                                        
                                    </div> <!-- end row -->
                                    
                                </div> <!-- end card-box -->
                                <div class="text-lg-right mt-3 mt-lg-0" style="float:left; padding-bottom: 2em">
                                                <a href="view-spare-part-report.php" class="btn btn-primary waves-effect waves-light"><i class=""></i> Print</a>
                                            </div>
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

                                  <?php if(isset($_GET['successupload'])){ ?>
                              <div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Successfully!</strong> uploaded</div>
                              <?php } ?>
                              <?php if(isset($_GET['errorupload'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Something went wrong, Try again !</div>
                              <?php } ?>

                               <?php if(isset($_GET['successorder'])){ ?>
                              <div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Successfully!</strong> One Order Done </div>
                              <?php } ?>
                              <?php if(isset($_GET['errororder'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Something went wrong, Try again !</div>
                              <?php } ?>

                              <?php if(isset($_GET['nothing'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Sorry!</strong> Nothing in the store</div>
                            <?php } ?>
                            <?php if(isset($_GET['not-valid'])){ ?>
                                <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong>  the quality is not valid , Try again !</div>
                            <?php } ?>
                            <?php if(isset($_GET['more'])){ ?>
                                <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Sorry!</strong> the quality you want is more than what we have in the stock!</div>
                            <?php } ?>
                            
                       <div class="row">


                                <?php

                                 if($_SESSION['logged_user_info_type'] == "client") { 

                                $query = "SELECT * FROM sparepart";
                                
                                if(isset($_GET['search'])){
                                  $search = $_GET['search'];
                                  $query = "SELECT * FROM sparepart WHERE sparepartName LIKE '%$search%'";
                                }   
                                if(isset($_GET['model'])){
                                    $model = $_GET['model'];
                                    $query = "SELECT * FROM sparepart WHERE sparepartModel LIKE '%$model%'";
                                }

                                $query = $conn->query($query);
                                $n=0;
                                while($row = $query->fetch_assoc())
                                {
                                ?> 
                                <div class="col-md-6 col-xl-3">
                                <div class="card-box product-box">

                                <?php  if($_SESSION['logged_user_info_type'] == "shareholder") {?>    
                                <div class="product-action">
                                <a href="update-spare-part.php?sparepartID=<?php echo $row['sparepartID'] ?>" class="btn btn-success btn-xs waves-effect waves-light"><i class="mdi mdi-pencil"></i></a>
                                <a href="view-spare-part.php?status=<?php echo $row['sparepartID'] ?>" class="btn btn-danger btn-xs waves-effect waves-light"><i class="mdi mdi-close"></i></a>
                                </div>
                                <?php } ?>
                                <div>
                                <a href="spare-part-details.php?sparepartID=<?php echo $row['sparepartID'];?>">
                                <img src="images/<?php echo $row['sparepartView'];?>" style="height: 200px;
                                            width: 90%;" alt="product-pic" class="img-fluid" />
                                 </a>
                                </div>

                                <div class="product-info">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="font-16 mt-0 sp-line-1"><a href="ecommerce-prduct-detail.html" class="text-dark"></a><?php echo $row['sparepartModel'];?> </h5>

                                            <h5 class="font-16 mt-0 sp-line-1"><a href="ecommerce-prduct-detail.html" class="text-dark"></a><?php echo $row['sparepartName'];?> </h5>
                                        
                                        <h5 class="m-0"> <span class="text-muted"> Stocks : <?php echo $row['pieces'];?> pcs</span></h5>
                                    </div>
                                    
                                        <div class="text-dark" >
                                            <b>RWF <?php echo $row['sparepartPrice'];?></b>
                                        </div>
                                    
                                </div> <!-- end row -->
                                </div> <!-- end product info-->

                                <br/>

                                <?php  if($_SESSION['logged_user_info_type'] == "client") {?> 
                                <div class="text-dark col">
                                      <a href="spare-part-details.php?sparepartID=<?php echo $row['sparepartID'];?>"> <button   class="btn btn-dark col">More Details</button></a>
                                </div>
                                <?php } ?>
                                </div> <!-- end card-box-->
                                </div> <!-- end col-->

                                <?php
                                }

                            }

                                ?>


                                 <?php

                                 if($_SESSION['logged_user_info_type'] == "shareholder") { 

                                $query = "SELECT * FROM sparepart where shareholderId=$user_id";
                        
                                $query = $conn->query($query);
                                $n=0;
                                while($row = $query->fetch_assoc())
                                {
                                ?> 
                                <div class="col-md-6 col-xl-3">
                                <div class="card-box product-box">

                                <?php  if($_SESSION['logged_user_info_type'] == "shareholder") {?>    
                                <div class="product-action">
                                <a href="update-spare-part.php?sparepartID=<?php echo $row['sparepartID'] ?>" class="btn btn-success btn-xs waves-effect waves-light"><i class="mdi mdi-pencil"></i></a>
                                <a href="view-spare-part.php?status=<?php echo $row['sparepartID'] ?>" class="btn btn-danger btn-xs waves-effect waves-light"><i class="mdi mdi-close"></i></a>
                                </div>
                                <?php } ?>
                                <div>
                                <img src="images/<?php echo $row['sparepartView'];?>" style="height: 200px;
                                            width: 90%;" alt="product-pic" class="img-fluid" />
                                </div>

                                <div class="product-info">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="font-16 mt-0 sp-line-1"><a href="ecommerce-prduct-detail.html" class="text-dark"></a><?php echo $row['sparepartModel'];?> </h5>

                                            <h5 class="font-16 mt-0 sp-line-1"><a href="ecommerce-prduct-detail.html" class="text-dark"></a><?php echo $row['sparepartName'];?> </h5>
                                        
                                        <h5 class="m-0"> <span class="text-muted"> Stocks : <?php echo $row['pieces'];?> pcs</span></h5>
                                    </div>
                                    
                                        <div class="text-dark" >
                                            <b>RWF <?php echo $row['sparepartPrice'];?></b>
                                        </div>
                                    
                                </div> <!-- end row -->
                                </div> <!-- end product info-->

                                <br/>

                                <?php  if($_SESSION['logged_user_info_type'] == "client") {?> 
                                <div class="text-dark col">
                                      <a href="spare-part-details.php?sparepartID=<?php echo $row['sparepartID'];?>"> <button   class="btn btn-dark col">Details</button></a>
                                </div>
                                <?php } ?>
                                </div> <!-- end card-box-->
                                </div> <!-- end col-->

                                <?php
                                }

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