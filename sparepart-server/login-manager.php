<?php
session_start();
// Establishing Connection with Server by passing server_name, user name, password and database as a parameter
include("lib/config/config.php");

$uname="";
$error=''; // Variable To Store Error Message
if(isset($_SESSION['logged_user_info']))
{
  header("Location: redirect.php");
}
if(isset($_POST['submit'])) {
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = md5(stripslashes($password));
// SQL query to fetch information of registerd users and finds user match.

$query = "SELECT gmID, status FROM generalmanager WHERE gmPassword = '$password' AND gmUsername = '$username' LIMIT 1";
$query = $conn->query($query);
$rows = $query->num_rows;
$arr = $query->fetch_array();
$user_id = $arr['gmID'];
$user_status = $arr['status'];
if ($rows == 1)
{
   if ($user_status != "Blocked")
   {
      $_SESSION['logged_user_info'] = $user_id; // Initializing Session
      $_SESSION['logged_user_info_type'] = "generalmanager"; // Initializing Session
      header("Location: redirect.php?_rdr"); // Redirecting To Other Page
   }
   else
   {
    $error='<div class="alert alert-warning alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Account Inactive. Contact Administrator for Support!</div>';
   }
}
else
{
    $error='<div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Invalid Username, Email or Password</div>';
}

}


?>

<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/ubold/layouts/material/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Aug 2019 12:27:13 GMT -->
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

    <body class="authentication-bg">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                            <?php if(isset($_GET['success'])){ ?>
                              <div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Successfully!</strong> Registered</div>
                              <?php } ?>
                              <?php if(isset($_GET['error'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Something went wrong, Try again !</div>
                              <?php } ?>

                                <div class="text-center w-75 m-auto">
                                    <a href="../sparepart-ui/index.php">
                                        <span><img src="../sparepart-ui/image/catalog/logo.png" alt="" height="22"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
                                </div>
    
                                <form action="#" method="POST">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Username</label>
                                        <input class="form-control" type="text" id="emailaddress" required="" name="username" placeholder="Enter your username">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required="" name="password" id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit" name="submit"> Log In </button>
                                    </div>

                                </form>

                                <div class="text-center">
                                    <a href="login-stakehoder.php"><h5 class="mt-3 text-muted">Sign as Stakeholder</h5></a>
                                    <a href="login-client.php"><h5 class="mt-3 text-muted">Sign as Client</h5></a>
                               
                                   
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                       
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            2015 - 2019 &copy; UBold theme by <a href="#" class="text-white-50">Coderthemes</a> 
        </footer>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

<!-- Mirrored from coderthemes.com/ubold/layouts/material/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Aug 2019 12:27:13 GMT -->
</html>