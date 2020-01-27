<?php
include("session.php");

if($_SESSION['logged_user_info_type'] == "client")
	{
        $query = "DELETE FROM order_tb where client=$user_id AND status!='paid'";
        $query = $conn->query($query);
    }

session_destroy(); // Destroying All Sessions
header("Location: login-stakehoder.php");
?>