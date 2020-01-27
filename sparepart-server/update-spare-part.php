<?php 
include('session.php');

$id=$_GET['sparepartID'];



if(isset($_POST['submit']))
{
    
    $model = $_POST['model'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $province = $_POST['province'];
    $district = $_POST['district']; 
    $sector = $_POST['sector'];
    $piece=$_POST['piece'];

    $date = $_POST['date'];

    $query = "UPDATE sparepart SET sparepartModel ='$model',sparepartName='$name', sparepartPrice='$price',province='$province',district='$district', sector='$sector', sparepartDate='$date',pieces='$piece' WHERE sparepartID = '$id'";
   

    if($conn->query($query)){

        header("Location: view-spare-part.php?successup");
    }else {
        header("Loction: update-spare-part.php?errorup");
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
                                            <li class="breadcrumb-item active">Update spare part</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Update spare part</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        

                                        <div class="row">
                                            <div class="col-lg-6">

                                                 <?php if(isset($_GET['success'])){ ?>
                              <div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Successfully!</strong> updated</div>
                              <?php } ?>
                              <?php if(isset($_GET['error'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Something went wrong, Try again !</div>
                              <?php } ?>


                                                <form method="POST" enctype="multipart/form-data">


                                                             <?php
                                                    $query = "SELECT * FROM sparepart where sparepartID=$id";
                                                    $query = $conn->query($query);
                                                    
                                                    while($row = $query->fetch_assoc())
                                                    {
                                                    ?> 

                                                    <div class="form-group mb-3">
                                                        <label for="simpleinput">Model</label>
                                                        <input type="text" name="model" class="form-control"
                                                        value="<?php echo $row['sparepartModel'];?>" 
                                                        >
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="example-email">Name</label>
                                                        <input type="text" id="example-email" name="name" class="form-control"  value="<?php echo $row['sparepartName'];?>">
                                                    </div>

                                                    
                                                    <div class="form-group mb-3">
                                                        <label for="example-password">Piece</label>
                                                        <input type="decimal" name="piece" id="example-password" class="form-control"  value="<?php echo $row['pieces'];?>">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="example-password">Price</label>
                                                        <input type="decimal" name="price" id="example-password" class="form-control"  value="<?php echo $row['sparepartPrice'];?>">
                                                    </div>
                                                      <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                                                     

                                                <!-- </form> -->
                                            </div> <!-- end col -->

                                            <div class="col-lg-6">
                                           <!--      <form> -->
         
                                                  <div class="form-group mb-3">
                                                        <label for="example-password">Province</label>
                                                        <input type="decimal" name="province" id="example-password" class="form-control"  value="<?php echo getlocation($row['province'], 'province'); ?>">
                                                    </div>


                                                    <div class="form-group mb-3">
                                                        <label for="example-password">District</label>
                                                        <input type="decimal" name="district" id="example-password" class="form-control"  value="<?php echo getlocation($row['district'], 'district'); ?>">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="example-password">Sector</label>
                                                        <input type="decimal" name="sector" id="example-password" class="form-control"  value="<?php echo getlocation($row['sector'], 'sector'); ?>">
                                                    </div>

                                                        <div class="form-group mb-3">
                                                        <label for="example-date">Date</label>
                                                        <input class="form-control" id="example-date" type="date" name="date">
                                                    </div>

                                                      <?php
                                                  }

                                                      ?>

        
                                                </form>
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
        
    </body>

<!-- Mirrored from coderthemes.com/ubold/layouts/material/forms-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Aug 2019 12:27:50 GMT -->
</html>