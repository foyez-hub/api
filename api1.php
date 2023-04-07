<?php

	$id=1;
	
	if(isset($_GET['id'])) {
		$id=$_GET['id'];
	  }
	

	error_reporting(0);
	$link = mysqli_connect("localhost", "root", "", "db0");
	
	$status = 'OK';
	$content = [];

	if (mysqli_connect_errno()) {
		$status = 'ERROR';
		$content = mysqli_connect_errors();
	}

	$query = "SELECT * FROM student_info WHERE stu_id=$id";

	if ($result = mysqli_query($link, $query)) {

	while ($row = mysqli_fetch_assoc($result)) {
		$content[] = $row; 
		}

	}

	$data = ["status" => $status, "content" => $content];
    header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json');
	echo json_encode($data); // get all products in json format.
?>