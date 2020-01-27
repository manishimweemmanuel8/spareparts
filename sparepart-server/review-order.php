<?php 
include('session.php');

$user_id;

if(isset($_POST['submit']))
{
    
    $quantity = $_POST['quantity'];


    $query = "SELECT * FROM sparepart where sparepartID=$id;";
    $query = $conn->query($query);
    
    while($row = $query->fetch_assoc())
     {
        $name=$row["sparepartName"];
        $model=$row["sparepartModel"];
        $shareholder=$row["shareholderId"];
        $location=$row["sector"];
        $price=$row["sparepartPrice"]*$quantity;
        
        $timestamp = time()+date("Z");
        $date=$d= gmdate("Y/m/d H:i:s",$timestamp);

        $client=$user_id;

    }
                                                                                                                                                                                                                             
    $query = "INSERT INTO order_tb(quantity, shareholder, orderLocation, orderDate,sparepartModel,sparepartName,client,price) VALUES ('$quantity','$shareholder', '$location', '$date', '$model', '$name','$client','$price')";
    if($conn->query($query)){

        header("Location: view-spare-part.php?successorder");
    }else {
        header("Loction: view-spare-part.php?errororder");
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Customer</a></li>
                                            <li class="breadcrumb-item active">Review Order</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Review Order</h4>
                                </div>
                            </div>
                        </div> 

                        <?php
                        }
                        ?>  

                         <?php  if($_SESSION['logged_user_info_type'] == "generalmanager") {?>
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">VSDS</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">General Manager</a></li>
                                            <li class="breadcrumb-item active">Review Order</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Review Order</h4>
                                </div>
                            </div>
                        </div> 

                        <?php
                        }
                        ?>   
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-xl-5">

                                        </div> <!-- end col -->
                                        <div class="col-xl-7">
                                            <div class="pl-xl-3 mt-3 mt-xl-0">
                                               

                                                
                                            </div>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <?php  if($_SESSION['logged_user_info_type'] == "client") {?>

                                    <div class="col-lg-12">
                                            <div class="text-lg-right mt-3 mt-lg-0">
                                                <a href="make-payment.php" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-plus-circle mr-1"></i> Make Payment</a>
                                            </div>
                                        </div><!-- end col-->

                                        <?php
                                    }
                                    ?>


                                     <?php  if($_SESSION['logged_user_info_type'] == "client") {?>


                                        <div class="text-lg-right mt-3 mt-lg-0" style="float: left">
                                                <a href="review-order-report.php" class="btn btn-primary waves-effect waves-light"><i class=""></i> Print</a>
                                            </div>

                                    <div class="table-responsive mt-4">
                                        <table class="table table-bordered table-centered mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Model</th>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>tax</th>
                                               
                                                    <th>Total Price</th>
                                                    
                                                   
                                                    
                                                </tr>
                                            </thead>

                                            
                                            <tbody>

                                               
                                 <?php
                                $query = "SELECT * FROM order_tb where client=$user_id AND status!='paid'";
                                $query = $conn->query($query);
                                $amount=0;
                                $tax=0;
                          
                                while($row = $query->fetch_assoc())
                                {
                                    ?>

                                                <tr>
                                                    <td><?php echo $row["sparepartModel"];?></td>
                                                    <td><?php echo $row["sparepartName"];?></td>

                                                    <td><?php echo $row["quantity"];?></td>
                                                    <td>RWF  <?php echo $row["price"]*18/100;?> </td>

                                                     
                                                   

                                                   
                                                   <td>RWF <?php echo $row["price"];?>  </td>


                                                   
                                                     <?php $amount=$amount+$row['price']; ?>
                                                     <?php $tax=$tax+$row["price"]*18/100; ?>
                                                   
                                               
                                            </tbody>
                                                             <?php

                            }
                            ?>
                                        </table>

                                         <div style="float: right">
                                      <b><p class="text-muted">Amount of spare part :  <?php echo $amount ?> RWF</p></b>
                                 </div>

                                 <p>         </p>

                                 

                           
                                    </div>

                                     <div style="float: right">
                                      <b><p class="text-muted">Tax of spare part :  <?php echo $tax ?> RWF</p></b>
                                 </div>

                                </div> <!-- end card-->

                                <?php
                            }
                            ?>

                            <?php  if($_SESSION['logged_user_info_type'] == "generalmanager") {?>



                                    <div class="table-responsive mt-4">

                              
                                    

                                            
                                        <table class="table table-bordered table-centered mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Model</th>
                                                    <th>Name</th>
                                                    
                                                    
                                                    <th>Quantity</th>
                                                    <th>tax</th>
                                               
                                                    <th>Total Price</th>
                                                    
                                                   
                                                    
                                                </tr>
                                            </thead>

                                            
                                            <tbody>

                                               
                                 <?php
                                $query = "SELECT * FROM order_tb";
                                $query = $conn->query($query);
                                $amount=0;
                                $tax=0;
                          
                                while($row = $query->fetch_assoc())
                                {
                                    ?>

                                                <tr>
                                                    <td><?php echo $row["sparepartModel"];?></td>
                                                    <td><?php echo $row["sparepartName"];?></td>

                                                    <td><?php echo $row["quantity"];?></td>
                                                    <td>RWF  <?php echo $row["price"]*18/100;?> </td>

                                                     
                                                   

                                                   
                                                   <td>RWF <?php echo $row["price"];?>  </td>


                                                   
                                                     <?php $amount=$amount+$row['price']; ?>
                                                     <?php $tax=$tax+$row["price"]*18/100; ?>
                                                   
                                                     <?php

                                                    }
                                                    ?>
                                            </tbody>
                                                             
                                        </table>

                                         <div style="float: right">
                                      <b><p class="text-muted">Amount of spare part :  <?php echo $amount ?> RWF</p></b>
                                 </div>

                                 <p>         </p>

                                 

                           
                                    </div>

                                     <div style="float: right">
                                      <b><p class="text-muted">Tax of spare part :  <?php echo $tax ?> RWF</p></b>
                                 </div>

                                </div> <!-- end card-->

                                <?php
                            }
                            ?>

                            
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->
                        
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