<?php
include("lib/config/config.php");
session_start(); // Starting Session
// Storing Session
if(!isset($_SESSION['logged_user_info']) || !isset($_SESSION['logged_user_info_type']))
{
	header('Location: logout.php'); // Redirecting To Home Page
}
else
{
	if($_SESSION['logged_user_info_type'] == "generalmanager")
	{
		$user_check=$_SESSION['logged_user_info'];
		// SQL Query To Fetch Complete Information Of User
		$query="SELECT * FROM generalmanager WHERE gmID = '$user_check'";
		$query = $conn->query($query);
		$arr = $query->fetch_array();
		$user_id = $arr['gmID'];
		$names = $arr['gmUsername'];
		$status = $arr['status'];
	}
	elseif($_SESSION['logged_user_info_type'] == "shareholder")
	{
		$user_check=$_SESSION['logged_user_info'];
		// SQL Query To Fetch Complete Information Of User
		$query="SELECT * FROM shareholder WHERE shareholderId = '$user_check'";
		$query = $conn->query($query);
		$arr = $query->fetch_array();
		$user_id = $arr['shareholderId'];
		$names = $arr['shareholderUsername'];
		$share_name = $arr['shareholderName'];
		$status = $arr['status'];
		
	}
	elseif($_SESSION['logged_user_info_type'] == "client")
	{
		$user_check=$_SESSION['logged_user_info'];
		// SQL Query To Fetch Complete Information Of User
		$query="SELECT * FROM client WHERE 	clientId = '$user_check'";
		$query = $conn->query($query);
		$arr = $query->fetch_array();
		$user_id = $arr['clientId'];
		$names = $arr['clientUsername'];
		$client_name = $arr['clientName'];
		$status = $arr['status'];
		
	}
	else
	{
	?>
		<script>
		window.location = '/logout.php';
		</script>
	<?php
	}
}
if(!isset($user_id))
{
?>
	<script>
	window.location = '/index.php';
	</script>
<?php
}
?>