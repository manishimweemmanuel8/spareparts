<?php
include('session.php');

$user_id;


if(isset($_GET['status2']))
{
   
    $s2Id = $_GET['status2'];

    $query = "UPDATE order_tb SET comment='You will receive your product(s) in 1 hour' WHERE orderNo = '$s2Id'";
 
    if($query = $conn->query($query)){
        header("Location: view-order.php?success");
    } else {
        header("Location: view-order.php?error");
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/ubold/layouts/material/ecommerce-sellers.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Aug 2019 12:27:02 GMT -->
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
    <?php include('includes/left-bar.php'); ?>
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
                                            <li class="breadcrumb-item active">View Order</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Client Account</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                         <?php if(isset($_GET['success'])){ ?>
                              <div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Successfully!</strong> Client notified</div>
                              <?php } ?>
                              <?php if(isset($_GET['error'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Something went wrong, Try again !</div>
                              <?php } ?>

                              <?php if(isset($_GET['successpending'])){ ?>
                              <div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Successfully!</strong> pending</div>
                              <?php } ?>
                              <?php if(isset($_GET['errorpending'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Something went wrong, Try again !</div>
                              <?php } ?>


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                                           
                                            </div>
                                            <div class="col-md-6">
                                                
                                            </div><!-- end col-->
                                        </div>
                 
                                        <div class="text-lg-right mt-3 mt-lg-0" style="float: left; margin-bottom:2em">
                                                <a href="view-order-report.php" class="btn btn-primary waves-effect waves-light"><i class=""></i> Print</a>
                                            </div>

                                        <div class="table-responsive">
                                            <table class="table table-centered table-borderless table-hover mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        
                                                        <th>Date & Time</th>
                                                        <th>District</th>
                                                        <th>Sector</th>
                                                        <th>Street No</th>
                                                        <th>Model</th>
                                                        <th>Name</th>
                                                        <th>Quantity</th>
                                                        <th>price</th>
                                                        <th>status</th>
                                                        <th>Action</th>
                                                        

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                        $query = "SELECT * FROM order_tb where shareholder=$user_id ORDER BY delivery_status ASC";
                                        $query = $conn->query($query);
                                        $n=0;
                                        while($row = $query->fetch_assoc())
                                        {
                                             
                                        ?>
                                                    <tr>
                                                     
                                                       
                                                         <td>
                                                            <?php echo $row['orderDate']; ?>
                                                        </td>
                                                       
                                                        <td>
                                                            <?php echo $row['district']; ?>
                                                        </td>
                                                        <td>
                                                          <?php echo $row['sector']; ?>
                                                        </td>
                                                        <td>
                                                           <?php echo $row['streetNo']; ?>
                                                        </td>

                                                        <td>
                                                           <?php echo $row['sparepartModel']; ?>
                                                        </td>

                                                        <td>
                                                           <?php echo $row['sparepartName']; ?>
                                                        </td>

                                                        <td>
                                                           <?php echo $row['quantity']; ?>
                                                        </td>

                                                        <td>
                                                           RWF<?php echo $row['price']; ?>
                                                        </td>

                                                         <td>
                                                           <?php echo $row['delivery_status']; ?>
                                                        </td>

                    
                                                        <td>
                                                             <?php if($row['comment'] != "You will receive your product(s) in 1 hour") { ?>
                                                    <a href="view-order.php?status2=<?php echo $row['orderNo'] ?>" class="badge badge-success">Notify client</a>
                                                  <?php } ?>
                                                        </td>
                                                    

                                                    
                                                    </tr>

                                                    <?php 
                                                }

                                                    ?>
                                                   
                                                </tbody>
                                            </table>
                                        </div>

                                        <ul class="pagination pagination-rounded justify-content-end my-2">
                                            <li class="page-item">
                                                <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                                    <span aria-hidden="true">«</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                                    <span aria-hidden="true">»</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        
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

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

<!-- Mirrored from coderthemes.com/ubold/layouts/material/ecommerce-sellers.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Aug 2019 12:27:02 GMT -->
</html>