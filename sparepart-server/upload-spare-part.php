<?php 
include('session.php');
$user_id;

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
    $shareholder=$user_id;

   //  $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
   //  $image_name= addslashes($_FILES['image']['tmp_name']);
   //  $image_size= getimagesize($_FILES['image']['tmp_name']);


   
   // move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $_FILES["image"]["name"]);            
   //          $location="image" . $_FILES["image"]["name"];

   
    $file=$_FILES['image']['name'];
            
    move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $_FILES["image"]["name"]);

                                                                                                                                                                                                                                    
    $query = "INSERT INTO sparepart(sparepartDate, sparepartModel, sparepartName, sparepartPrice, sparepartView, district, sector, province,pieces,shareholderId) VALUES ('$date','$model', '$name', '$price', '$file', '$district', '$sector', '$province','$piece','$shareholder')";
    if($conn->query($query)){

        header("Location: view-spare-part.php?successupload");
    }else {
        header("Loction: view-spare-part.php?errorupload");
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
                        
                    <?php if(isset($_GET['success'])){ ?>
                              <div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Successfully!</strong> Registered</div>
                              <?php } ?>
                              <?php if(isset($_GET['error'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Something went wrong, Try again !</div>
                              <?php } ?>

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">VSDS</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Shareholder</a></li>
                                            <li class="breadcrumb-item active">Account</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Upload spare part</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
 
                        <?php if(isset($_GET['success'])){ ?>
                              <div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Successfully!</strong> Uploaded</div>
                              <?php } ?>
                              <?php if(isset($_GET['error'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Something went wrong, Try again !</div>
                              <?php } ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <form method="POST" enctype="multipart/form-data">

                                                    <div class="form-group mb-3">
                                                        <label for="simpleinput">Model</label>
                                                        <input type="text" name="model" class="form-control"
                                                        placeholder="Enter model"
                                                        >
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="example-email">Name</label>
                                                        <input type="text" id="example-email" name="name" class="form-control" placeholder="Enter spare part name">
                                                    </div>

                                                     <div class="form-group mb-3">
                                                        <label for="example-fileinput">Picture</label>
                                                        <input type="file" name="image"  class="form-control-file">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="example-password">Piece</label>
                                                        <input type="decimal" name="piece" id="example-password" class="form-control" placeholder="Enter number of piece">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="example-password">Price</label>
                                                        <input type="decimal" name="price" id="example-password" class="form-control" placeholder="Enter spare part price">
                                                    </div>


                                                <!-- </form> -->
                                            </div> <!-- end col -->

                                            <div class="col-lg-6">
                                           <!--      <form> -->
        
                                           <div class="col-md-12 form-group">
                                                <label for="">Province/Intara</label>
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

                                            <div class="col-md-12 form-group">
                                                <label for="">District/Akarere</label>
                                                <select id="district" name="district" class="form-control" onchange="fetch_sector()">
                                                    <option value="0" selected disabled>District/Akarere</option>
                                                </select>
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <label>Sector/Umurenge</label>
                                                <select class="form-control" id="sector" name="sector" >
                                                    <option value="0" selected disabled>Sector/Umurenge</option>
                                                </select>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="example-date">Date</label>
                                                <input class="form-control" id="example-date" type="date" name="date">
                                            </div>
                                                   
                                                      <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Submit</button>

        
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