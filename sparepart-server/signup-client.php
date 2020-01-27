
<?php
include('session.php');

if(isset($_POST['submit']))
{
   
    $names = $_POST['names'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5(stripslashes($password));                                                                                                                                                                                                                                 
    $date = date('Y-m-d');
    $query = "INSERT INTO client(clientName, clientEmail, clientPhonenumber, clientUsername, clientPassword, date, status) VALUES ('$names','$email', '$phone', '$username', '$password', '$date', 'Active')";
    if($conn->query($query)){
        header("Location: signup-client.php?success");
    }else {
        header("Location: signup-client.php?error");
    }

    
}
?>


<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/ubold/layouts/material/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Aug 2019 12:27:13 GMT -->
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

    <body class="authentication-bg authentication-bg-pattern">

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
                                    <p class="text-muted mb-4 mt-3">Don't have an account? Create your account, it takes less than a minute</p>
                                </div>

                                <form action="#" method="POST">

                                    <div class="form-group">
                                        <label for="fullname">Full Name</label>
                                        <input class="form-control" type="text" id="fullname" placeholder="Enter your name" required name="names">
                                    </div>
                                    <div class="form-group">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" id="emailaddress" required placeholder="Enter your email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="emailaddress">Telephone</label>
                                        <input class="form-control" type="tel" name="phone" id="phone" required placeholder="Enter your Telephone" name="phone">
                                    </div>

                                    <div class="form-group">
                                        <label for="emailaddress">Username</label>
                                        <input class="form-control" type="text" id="username" required placeholder="Enter your username" name="username">
                                    </div>


                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required id="password" placeholder="Enter your password" name="password">
                                    </div>
                                    
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-success btn-block" type="submit" name="submit"> Sign Up </button>
                                    </div>

                                </form>

                               

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted-50">Already have account?  <a href="login-client.php" class="text-muted ml-1"><b>Sign In</b></a></p>
                            </div> <!-- end col -->
                        </div>
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

<!-- Mirrored from coderthemes.com/ubold/layouts/material/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Aug 2019 12:27:13 GMT -->
</html>