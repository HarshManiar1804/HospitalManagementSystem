<?php
	$name=$_GET['Aname'];
	$email=$_GET['Aemail'];
	$Password=$_GET['Apassword'];
	$phone=$_GET['Aphone'];
	$gender=$_GET['Agender'];
	$con=mysqli_connect("localhost","root","","aayush hospital");
	$query=INSERT INTO user (UserId, FullName, Email, Password, ContactNo, Gender) VALUES (NULL, '$name', '$email', '$Password', '$phone', '$gender')";
	$execute=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($execute);
	print_R($row);
?>