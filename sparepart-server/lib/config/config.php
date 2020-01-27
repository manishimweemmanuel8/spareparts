<?php
$server="localhost";
$user="root";
$pass="";
$db="mysystem20001";
$conn = new mysqli($server, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
function getlocation($id, $location) {
    $conn = new mysqli('localhost', 'root', '', 'mysystem20001');
    //
    $query = "SELECT name FROM $location WHERE id = '$id'";
    $query = $conn->query($query);
    $row = $query->fetch_assoc();
    return $row['name'];
}

?>