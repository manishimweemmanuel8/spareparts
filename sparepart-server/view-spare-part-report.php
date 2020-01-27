<?php
include("session.php");

$user_id;
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

                                    <div class="row">
                                         <h3 style="margin-left:40%">Products Report</h3>
                                        <table class="table table-striped table-bordered" cellspacing="0"
                                           width="200%">
                                           <thead>
                                        <tr>
                                            <!-- <th>#</th> -->
                                            <th>#</th>
                                            <th>Model</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Date</th>
                                            
                                            <th>sector</th>
                                           
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $query = "SELECT * FROM sparepart where shareholderId=$user_id";
                                        
                                        $query = $conn->query($query);
                                        $amount = 0;
                                        $n=0;
                                        while($row = $query->fetch_assoc())
                                        { 

                                        $n++;
                                        ?>
                                        <tr>

                                            <td><?php echo $n; ?> </td>
                                            <td><?php echo $row['sparepartModel'];?></td>
                                            <td><?php echo $row['sparepartName']; ?></td>
                                            <td><?php echo $row['sparepartPrice']; ?> RWF</td>
                                            <td><?php echo $row['pieces']; ?> </td>
                                            <td><?php echo $row['sparepartPrice']*$row['pieces']; ?> RWF </td>
                                            <td><?php echo $row['sparepartDate']; ?></td>
                                            
                                            <td><?php echo $row['sector']; ?></td>

                                           <?php $amount=$amount+$row['sparepartPrice']*$row['pieces']; ?>
                                           
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                     <div style="float: right">
                                      <b><p class="text-muted">Amount of spare part :  <?php echo $amount ?> RWF</p></b>
                                 </div>
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