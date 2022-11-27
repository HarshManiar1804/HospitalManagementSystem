<?php

	require_once("connectionforjson.php");
	$uemail=$_GET['email'];
	$docid=$_GET['Doctorid'];
	$speid=$_GET['Specializationid'];
	$appdate=$_GET['Appointmentdate'];
	$apptime=$_GET['Appointmenttime'];

	

	//echo gettype($docid);

	

	if (!$con) {
    die("Connection failed: " . mysqli_connect_error());

	 	
	 	$response[]= array('status' => 0);
	}
	else
	{
		$query="INSERT INTO appointment(Email,DoctorId,DoctorSpecialization,AppointmentDate,AppointmentTime,DoctorStatus) values('$uemail','$docid','$speid','$appdate','$apptime','1')";
		$execute=mysqli_query($con,$query);

		if (mysqli_errno($con)) {
					//mysqli_error($con);
					echo mysqli_error($con);
					
		}
		/*if (mysqli_errno($con)) {
			echo mysqli_error($con);
		}*/
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
	
?>