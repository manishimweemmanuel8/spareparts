

<div class="left-side-menu">

        <div class="slimscroll-menu">

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">Navigation</li>

                    <li>
                        <a href="index.php">
                            <i class="fe-airplay"></i>
                            <span class="badge badge-success badge-pill float-right"></span>
                            <span> Dashboards </span>
                        </a>

                       <?php if($_SESSION['logged_user_info_type'] == "generalmanager"){ ?>
                        <li>
                            <a href="client-account.php">Client Account</a>
                        </li>

                          <li>
                            <a href="shareholder-account.php">Shareholder Account</a>
                        </li>

                        <li>
                            <a href="review-order.php">Review Payment</a>
                        </li>
                        <li>
                            <a href="view-payment.php">View Payment</a>
                        </li>
                        <li>
                            <a href="view-evalute-payment.php">View Evalute Payment</a>
                        </li>

                        <li>
                            <a href="view-approved-payment.php">View Approved Payment</a>
                        </li>

                        <li>
                            <a href="view-denied-payment.php">View Denied Payment</a>
                        </li>

                       <?php } ?>
                      

                        <?php  if($_SESSION['logged_user_info_type'] == "shareholder" || $_SESSION['logged_user_info_type'] == "client") {?>
                        <li>
                            <a href="view-spare-part.php">View Spare part</a>
                        </li>
                    <?php } ?>

                         <?php  if($_SESSION['logged_user_info_type'] == "shareholder") {?>

                        <li>
                            <a href="view-order.php">View Order</a>
                        </li>

                        <li>
                            <a href="view-approved-shareholder.php">Approved</a>
                        </li>

                        <li>
                            <a href="view-delivered-shareholder.php">Delivered</a>
                        </li>

                        <?php } ?>
                       
                        <?php  if($_SESSION['logged_user_info_type'] == "client") {?>
                        <li>
                            <a href="notifications.php">Progress</a>
                        </li>

                        <li>
                            <a href="client-paid.php">Paid</a>
                        </li>

                        <li>
                            <a href="client-approved.php">Approved</a>
                        </li>

                        
                        <li>
                            <a href="client-delivered.php">Deliverered</a>
                        </li>

                        <?php } ?>

                    </li>


                    
                </ul>

            </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>