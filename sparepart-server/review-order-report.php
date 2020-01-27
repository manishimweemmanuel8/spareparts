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
            
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                   
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
 

                           
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

                                    


                                    <div class="table-responsive mt-4" style="margin-left:4em">
                                    <h3 style="margin-left:40%">Current orders</h3>
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

                                         <div style="float: left">
                                      <b><p class="text-muted">Amount of spare part :  <?php echo $amount ?> RWF</p></b>
                                 </div>

                                 <p>         </p>

                                 

                           
                                    </div>

                                     <div style="float: left; margin-left:4em">
                                      <b><p class="text-muted">Tax of spare part :  <?php echo $tax ?> RWF</p></b>
                                 </div>

                                </div> <!-- end card-->

                            

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

                                     <div style="float: right; margin-right:  10em">
                                      <p class="text-muted">Printed by <?php echo $names;?></p>
                                 </div>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
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
        function printMe() {
            $('#print_btn').hide();
            $('.form').hide();
            window.print();
            $('#print_btn').show();
            $('.form').show();

            
        }
        </script>


    </body>
 
<!-- Mirrored from coderthemes.com/ubold/layouts/material/forms-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Aug 2019 12:27:50 GMT -->
</html>