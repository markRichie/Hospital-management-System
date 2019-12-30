<?php
header('Content-Type: application/json');

//require_once('db.php');
$conn = mysqli_connect("localhost", "root", "","hospital_db");
$sqlQuery = "SELECT `name`,`qty` FROM medicine";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//mysqli_close($conn);

echo json_encode($data);
?>