<?php 
include('session.php');

$user_id;



$id=$_GET['paymentNo'];
// $clientId=$_GET['clientId'];

if(isset($_GET['status']))
{
   
    $sId = $_GET['status'];
    
    $queryi = "SELECT client FROM payment WHERE paymentNo = '$sId'";
    $queryi = $conn->query($queryi);
    $row = $queryi->fetch_assoc();
    $clientId = $row['client'];

    $query = "UPDATE payment SET status = 'Approve',comment='your payment Approved' WHERE paymentNo = '$sId'";
    $query = $conn->query($query);
    
    $queryu = "UPDATE order_tb SET delivery_status = 'Approved', comment='Your payment is aprooved' WHERE client = '$clientId' AND status = 'paid' AND delivery_status = ''";
    if($queryu = $conn->query($queryu)){
        header("Location: view-payment.php?successapproved");
    }else {
        header("Location: view-payment.php?errorapprove");
    }
    echo $clientId;

}

if(isset($_GET['status2']))
{
   
    $s2Id = $_GET['status2'];

    $query = "UPDATE payment SET status = 'Denied',comment='your payment denied' WHERE paymentNo = '$s2Id'";
 
    if($query = $conn->query($query)){
        header("Location: view-payment.php?successdeny");
    } else {
        header("Location: view-payment.php?errordeny");
    }
}
echo $clientId;
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
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">VSDS</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">General Manager</a></li>
                                            <li class="breadcrumb-item active">Payment Detail</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Payment Detail</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                         <?php if(isset($_GET['success'])){ ?>
                              <div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Successfully!</strong> Approve Payment</div>
                              <?php } ?>
                              <?php if(isset($_GET['error'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Something went wrong, Try again !</div>
                              <?php } ?>

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-xl-5">

                                                        <?php
                                $query = "SELECT * FROM payment where paymentNo=$id;";
                                $query = $conn->query($query);
                          
                                while($row = $query->fetch_assoc())
                                {
                                     $client=$row["client"];
                                    
                                            ?>
                               

                                            <div class="tab-content pt-0">
                                                <div class="tab-pane active show" id="product-1-item">
                                                    <img src="images/<?php echo $row["bank_slip"];?>" alt="" class="img-fluid mx-auto d-block rounded">
                                                </div>
                                                
                                            </div>

                                           
                                        </div> <!-- end col -->
                                        <div class="col-xl-7">
                                            <div class="pl-xl-3 mt-3 mt-xl-0">
                                                <a class="text-primary"><?php echo $row["paymentDate"];?></a>
                                            <br/>
                                                <h4 class="mb-3">Price : <?php echo $row["paymentValue"];?> RWF</h4>
                                                
                                                
                                                
                                                <h4 class="mb-4"><span class="text-muted mr-2"></span> <b><?php echo $row["status"];?> </b></h4>
                                                
                                                
                                                
                                                
                                                <form method="POST" class="form-inline mb-4" enctype="multipart/form-data" >
                                                
                                        <div class="row">
                                                 <div class="col-md-12 form-group mb-3">
                                                  <?php if($row['status'] == "evalute") { ?>
                                                    <a href="view-payment-details.php?status=<?php echo $row['paymentNo'] ?>" type="submit" name="submit" class="btn btn-success waves-effect waves-light">
                                                        <span class="btn-label"></span>Approve
                                                   
                                                    </a>
                                                  <?php }?>

                                                 </div>
                                                 </div>


                                         <div class="row">
                                                 <div class="col-md-12 form-group mb-3">
                                                  <?php if($row['status'] == "evalute") { ?>
                                                    <a href="view-payment-details.php?status2=<?php echo $row['paymentNo'] ?>"  type="submit" name="submit" class="btn btn-success waves-effect waves-light">
                                                        <span class="btn-label"></span>Deny
                                                    
                                                    </a>
                                                  <?php }?>

                                                 </div>
                                                 </div>
                                         
                                                </form>


                                           

                                                
                                            </div>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->


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
                                $query = "SELECT * FROM order_tb where client=$client";
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


        <script>
          
          function fetch_district()
          {
            var form_data = {
              name: $("#province").val()
            };
            $.ajax({
              url: "lib/modules/fetch_district.php",
              type: 'POST',
              dataType: 'json',
              data: form_data,
              success: function(msg) {
                var sc='';
                $.each(msg, function(key, val) {
                  sc+='<option value="'+val.id+'">'+val.name+'</option>';
                });
                $("#district option").remove();
                $("#district").append('<option value="0" disabled selected>District/Akarere</option>');
                $("#sector option").remove();
                $("#sector").append('<option value="0" disabled selected>Sector/Umurenge</option>');
                $("#cell option").remove();
                $("#cell").append('<option value="0" disabled selected>Cell/Akagari</option>');
                $("#village option").remove();
                $("#village").append('<option value="0" disabled selected>Village/Umudugudu</option>');
                $("#district").append(sc);
              }
            });
          }
          function fetch_sector()
          {
            var form_data = {
              name: $("#district").val()
            };
            
            $.ajax({
              url: "lib/modules/fetch_sector.php",
              type: 'POST',
              dataType: 'json',
              data: form_data,
              success: function(msg) {
                var sc='';
                $.each(msg, function(key, val) {
                 sc+='<option value="'+val.id+'">'+val.name+'</option>';
                });
               $("#sector option").remove();
               $("#sector").append('<option value="0" disabled selected>Select Sector</option>');
               $("#cell option").remove();
               $("#cell").append('<option value="0" disabled selected>Select Cell</option>');
               $("#village option").remove();
               $("#village").append('<option value="0" disabled selected>Select Village</option>');
               $("#sector").append(sc);
              }
            });
          }
         
          

        </script>
        
    </body>

<!-- Mirrored from coderthemes.com/ubold/layouts/material/forms-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Aug 2019 12:27:50 GMT -->
</html>