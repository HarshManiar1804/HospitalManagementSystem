<?php
	require_once("connectionforjson.php");
	$name=$_GET['Aname'];
	$email=$_GET['Aemail'];
	$Password=$_GET['Apassword'];
	$phone=$_GET['Aphone'];
	$gender=$_GET['Agender'];
	

	if (!$con) {
    die("Connection failed: " . mysqli_connect_error());

	 	
	 	$response[]= array('status' => 0);
	}
	else
	{
		$query="INSERT INTO user (UserId, FullName, Email, Password, ContactNo, Gender) VALUES (NULL, '$name', '$email', '$Password', '$phone', '$gender')";
	$execute=mysqli_query($con,$query);
	if (!$execute) {
	 	
	 	$response[]= array('status' => 0);
	 } 
	 else
	 {
	 
	 	$response[]= array('status' => 1);
	 }


	 $json_data = json_encode($response);

	echo "$json_data";
	
	}
	




	
