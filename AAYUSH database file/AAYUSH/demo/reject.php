<?php
	require_once("connection.php");
	$appid=$_GET['AppointId'];
	 
	 if (!$con) {
	 	echo "not connect to the network";
	 }
	 else
	 {
	 	$query="UPDATE appointment SET DoctorStatus = '3' WHERE appointment.AppointId = $appid";
	 	$execute=mysqli_query($con,$query);
	 	if (isset($execute)) {
	 		echo "Status update";
	 		header("Location:manageappointment.php");
	 	}
	 }
?>	