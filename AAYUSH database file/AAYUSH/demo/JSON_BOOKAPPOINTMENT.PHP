<?php
	$uemail=$_GET['email'];
	$docid=$_GET['Doctorid'];
	$speid=$_GET['Specializationid'];
	$appdate=$_GET['Appointmentdate'];
	$apptime=$_GET['Appointmenttime'];

	$con=mysqli_connect("localhost","root","","aayush hospital");

	if (!$con) {
    die("Connection failed: " . mysqli_connect_error());

	 	
	 	$response[]= array('status' => 0);
	}
	else
	{
		$query="INSERT INTO appointment(Email,DoctorId,DoctorSpecialization,AppointmentDate,AppointmentTime) values('$uemail','$docid','$speid','$appdate','$apptime')";
		$execute=mysqli_query($con,$query);

		if (mysqli_errno($con)) {
					$_SESSION['upddoc']=mysqli_error($con);
					header("Location:managedoctor.php");
					die();
					
		}

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