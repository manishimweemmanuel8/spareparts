<?php
include('session.php');

if($_SESSION['logged_user_info_type'] == "generalmanager")
{
	header("Location: i
	ndex.php");
}
elseif ($_SESSION['logged_user_info_type'] == "shareholder")
{
	header("Location: index.php");
}
elseif ($_SESSION['logged_user_info_type'] == "client")
{
	header("Location: index.php");
}
else{
	header("Location: index.php");
}



?>