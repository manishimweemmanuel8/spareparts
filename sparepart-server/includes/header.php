<?php 
// include('session.php');

// request('lib/config/config.php');

$user_id;

?>


<div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">
       
        
        
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell noti-icon"></i>
                    <?php
                        $query3 = "SELECT * FROM order_tb where client=$user_id ORDER BY orderDate DESC";
                        $query3 = $conn->query($query3);
                        $rows3 = $query3->num_rows;
                    ?>
                    <span class="badge badge-danger rounded-circle noti-icon-badge"><?php echo number_format($rows3) ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-right">
                                <a href="#" class="text-dark">
                                    <small>Clear All</small>
                                </a>
                            </span>Notification
                        </h5>
                    </div>
                   
                    <div class="slimscroll noti-scroll">
       
                        <!-- item-->
                         <?php  if($_SESSION['logged_user_info_type'] == "client") {?>
                             <?php $query = "SELECT * FROM order_tb where client=$user_id ORDER BY orderDate DESC";
                                $query = $conn->query($query);
                                $amount=0;
                                $tax=0;
                          
                                while($row = $query->fetch_assoc())
                                {
                                    ?>
                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                            <div class="notify-icon">
                                <img src="images/logo.png" class="img-fluid rounded-circle" alt="" />
                                 </div>
                            <p class="notify-details"> <?php echo $row["sparepartModel"];?> , <?php echo $row["sparepartName"];?> </p>
                           
                            <p class="text-muted mb-0 user-msg">
                               
                                <small>Hi, <b><?php echo $row["delivery_status"];?></b></small>
                            </p>

                            <p class="text-muted mb-0 user-msg">
                               
                                <small><b><?php echo $row["comment"];?></b></small>
                            </p>
                            
                        </a>

                        <?php
                        }
                      }     
                    ?>

                    <!-- All-->
                    <a href="notifications.php" class="dropdown-item text-center text-primary notify-item notify-all">
                        View all
                        <i class="fi-arrow-right"></i>
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="images/user.jpg" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                        <?php echo $names; ?> <i class="mdi mdi-chevron-down"></i> 
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                   

                    <!-- item-->
                   

                    <!-- item-->
                   

                    <!-- item-->
                    

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="logout.php" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list">
                <!-- <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                    <i class="fe-settings noti-icon"></i>
                </a> -->
            </li>


        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="index.html" class="logo text-center">
                <span class="logo-lg">
                    <img src="images/logo.png" alt="" height="22">
                    <!-- <span class="logo-lg-text-light">UBold</span> -->
                </span>
                <span class="logo-sm">
                    <!-- <span class="logo-sm-text-dark">U</span> -->
                    <!-- <img src="assets/images/logo-sm.png" alt="" height="24"> -->
                </span>
            </a>
        </div>
 
        <!-- <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            

           
        </ul> -->
    </div>