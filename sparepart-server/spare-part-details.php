<?php 
include('session.php');

$user_id;



$id=$_GET['sparepartID'];


if(isset($_POST['submit']))
{
    
    $quantity = $_POST['quantity'];
     $province=$_POST['province'];
     $district=$_POST['district'];
     $sector=$_POST['sector'];
      $client=$user_id;
      $status=" ";
      $street=$_POST['street'];
      $comment="You have paid this order, please wait until is aprooved";
      $delivery_status="";



    $query = "SELECT * FROM sparepart where sparepartID=$id";
    $query = $conn->query($query);
    $row = $query->fetch_assoc();
     
        $name=$row["sparepartName"];
        $model=$row["sparepartModel"];
        $shareholder=$row["shareholderId"];
        $location=$row["sector"];
        $price=$row["sparepartPrice"]*$quantity;
        $timestamp = time()+date("Z");
        $date=$d= gmdate("Y/m/d H:i:s",$timestamp);
        $currentQuality = $row['pieces'];
        $newQuantity = $currentQuality - $quantity;

    if($currentQuality!=0){
        if($quantity<=0){
            header("Location: view-spare-part.php?not-valid");
        }elseif($quantity>$currentQuality){
            header("Location: view-spare-part.php?more");
        }else{
        $query = "INSERT INTO order_tb(quantity, shareholder,district, orderDate,sparepartModel,sparepartName,client,price,sector,status,province,streetNo,comment,delivery_status) VALUES ('$quantity','$shareholder', '$district','$date', '$model', '$name','$client','$price','$sector','$status','$province','$street','$comment','$delivery_status')";
        if($conn->query($query)){
            
            $queryu = "UPDATE sparepart SET pieces ='$newQuantity' WHERE sparepartID=$id";
            if($conn->query($queryu)){
                header("Location: view-spare-part.php?successorder");
            }else {
                header("Loction: view-spare-part.php?errororder");
                }
        }
    }
  }else{
    
    header("Location: view-spare-part.php?nothing");
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
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">VSDS</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Customer</a></li>
                                            <li class="breadcrumb-item active">Spare Part Detail</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Spare Part Detail</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-xl-5">

                                                        <?php
                                $query = "SELECT * FROM sparepart where sparepartID=$id;";
                                $query = $conn->query($query);
                          
                                while($row = $query->fetch_assoc())
                                {
                                     $shareholder=$row["shareholderId"];
                                     $rev=$row["sparepartPrice"]*15; 
                                            $totalRev=$rev/100;
                                            ?>
                               

                                            <div class="tab-content pt-0">
                                                <div class="tab-pane active show" id="product-1-item">
                                                    <img src="images/<?php echo $row["sparepartView"];?>" alt="" class="img-fluid mx-auto d-block rounded">
                                                </div>
                                                
                                            </div>

                                           
                                        </div> <!-- end col -->
                                        <div class="col-xl-7">
                                            <div class="pl-xl-3 mt-3 mt-xl-0">
                                                <a class="text-primary"><?php echo $row["sparepartModel"];?></a>
                                            <br/>
                                                <h4 class="mb-3"><?php echo $row["sparepartName"];?></h4>
                                                
                                                
                                                
                                                <h4 class="mb-4">Price : <span class="text-muted mr-2"></span> <b><?php echo $row["sparepartPrice"];?> RWF</b></h4>
                                                <h4><span class="badge bg-soft-success text-success mb-4">Instock</span></h4>
                                                
                                                
                                                
                                                <form method="POST" class="form-inline mb-4" enctype="multipart/form-data" >
                                                <div class="row">
                                                    <div class="form-group mb-3 col-md-3">
                                                        <input type="decemal" name="quantity" class="form-control"
                                                        placeholder="Enter Quantity"
                                                        >
                                                    </div>
                                                    <div class="form-group mb-3 col-md-3">
                                                        <input type="text" name="street" class="form-control"
                                                        placeholder="Enter Street No"
                                                        >
                                                    </div>
                                                   </div>
                                                 <div class="row">
                                                 <div class="col-md-3 form-group mb-3">
                                                <select class="form-control" id="province" name="province" onchange="fetch_district()">
                                                <option value="0" selected disabled>Province/Intara</option>
                                                <?php
                                                        $query="SELECT * FROM province";
                                                        $query = $conn->query($query);
                                                        while ($rowSingle = $query->fetch_assoc()) {
                                                        ?>
                                                        <option value="<?php echo $rowSingle['id'] ?>"><?php echo $rowSingle['name'] ?></option>
                                                        <?php
                                                        }
                                                ?>
                                                </select>
                                            </div>

                                            <div class="col-md-3 form-group mb-3">
                                                <select id="district" name="district" class="form-control" onchange="fetch_sector()">
                                                    <option value="0" selected disabled>District/Akarere</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 form-group mb-3">
                                                <select class="form-control" id="sector" name="sector" >
                                                    <option value="0" selected disabled>Sector/Umurenge</option>
                                                </select>
                                            </div>
                                         </div>
                                         <div class="row">
                                                 <div class="col-md-12 form-group mb-3">
                                                    <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">
                                                        <span class="btn-label"><i class="mdi mdi-cart"></i></span>Add to cart
                                                    </button>
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
                                                    <th>Province</th>
                                                    <th>Destrict</th>
                                                    <th>Sector</th>
                                                    <th>Shareholder</th>
                                                    <th>Price</th>
                                                    <th>Stock</th>
                                                    
                                                </tr>
                                            </thead>

                                            
                                            <tbody>
                                                <tr>
                                                    <td><?php echo getlocation($row['province'], 'province'); ?></td>
                                                    <td><?php echo getlocation($row['district'], 'district'); ?></td>
                                                    <td><?php echo getlocation($row['sector'], 'sector');?></td>
                                                    <?php

                                                    $query = "SELECT * FROM shareholder where shareholderId=$shareholder;";
                                                        $query = $conn->query($query);
                                                        
                                                        while($rows = $query->fetch_assoc())
                                                         {

                                                            ?>

                                                    <td><?php echo $rows["shareholderName"];?></td>
                                                <?php }
                                                ?>
                                                   <td>RWF <?php echo $row["sparepartPrice"];?>  </td>

                                                    
                                                    <td>
                                                        <div class="progress-w-percent mb-0">
                                                            <span class="progress-value"><?php echo $row["pieces"];?> </span>
                                                            <div class="progress progress-sm">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 56%;" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                   
                                               
                                            </tbody>
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