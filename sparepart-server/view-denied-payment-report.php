<?php
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Vaccines Educational and Reminding System" name="description" />
        <meta content="Auca" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

   <style>
     #vacc{
        padding-top: 2em;
     }
     .margin-btm{
         margin-bottom:0.5em;
     }
   </style>
    </head>


    <body style="margin: 0px;width: 100%">

        <div id="page-wrapper" style="margin: 0px;width: 100%">

            <!-- Page content start -->
            <div class="page-contentbar" style="margin: 0px;width: 100%">

                <!-- START PAGE CONTENT -->
                <div style="margin: 0px; width: 100%">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-body">
                                    <div class="clearfix">
                                        <div class="pull-left">
                                           
                                        
                                        </div>
                                        
                                    </div>
                                     
                                        <div style="margin-left:30%">
                                            <div class="">
                                                <a class="logo">
                                                    <img src="images/logo.png" alt="logo" class="logo-lg" style="height: 50px;" />
                                                    </a>
                                            </div>
                                        </div>
                                     
                                        <div style="float: right; margin-bottom: 2em;">
                                            <p class="text-muted">Printed on <?php echo Date('Y-m-d')?></p>
                                            <button class="btn btn-dark" id="print_btn" onclick="printMe()">PRINT</button>
                                        </div>

                                    <div class="row m-t-30">
                                        <div class="col-xs-9">
                                            <h5>Address</h5>
                                            <address class="line-h-24">
                                                KG 569 Street Kigali, Rwanda<br>
                                                info@spareparts.rw<br>
                                                <abbr title="Phone">P:</abbr> (+250) 788 211 579
                                            </address>
                                        </div>
                                    </div>
                                    <h3 style="margin-left:40%">All Denied payment Report</h3>

                                    <div class="row">

                                   
                                    <?php

                                

$query = "SELECT * FROM payment where status='Denied'";

$query = $conn->query($query);
$n=0;
while($row = $query->fetch_assoc())
{
?> 
<div class="col-md-6 col-xl-3">
<div class="card-box product-box">


<div>
<img src="images/<?php echo $row['bank_slip'];?>" style="height: 200px;
            width: 90%;" alt="product-pic" class="img-fluid" />
</div>

<div class="product-info">
<div class="row align-items-center">
    <div class="col">
        <h5 class="font-16 mt-0 sp-line-1"><a href="" class="text-dark"></a><?php echo $row['status'];?> </h5>

            
        
        <h5 class="m-0"> <span class="text-muted"> <?php echo $row['paymentDate'];?></span></h5>
    </div>
    
        <div class="text-dark" >
            <b>RWF <?php echo $row['paymentValue'];?></b>
        </div>
    
</div> <!-- end row -->
</div> <!-- end product info-->

<br/>


<div class="text-dark col">
      <a href="view-payment-details.php?paymentNo=<?php echo $row['paymentNo'];?> & clientId=<?php echo $row['client'];?> "> <button   class="btn btn-dark col">Details</button></a>
</div>

</div> <!-- end card-box-->
</div> <!-- end col-->

<?php


}

?>

                                    </div>
                                     
                                    <div style="float: right">
                                      <p class="text-muted">Printed by <?php echo $names;?></p>
                                 </div>

                                </div>
                            </div>

                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end container -->

                </div>
                <!-- End #page-right-content -->

            </div>
            <!-- end .page-contentbar -->
        </div>
        <!-- End #page-wrapper -->



        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>
     
        <!-- App Js -->
        <script src="assets/js/jquery.app.js"></script>

        <script>
        function printMe() {
            $('#print_btn').hide();
            $('.form').hide();
            window.print();
            $('#print_btn').show();
            $('.form').show();

            
        }
        </script>
    </body>

</html>