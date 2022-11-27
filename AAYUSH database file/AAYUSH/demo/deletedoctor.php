<?php
	require_once("connection.php");
	session_start();
	$DoctorId=$_GET['DoctorId'];
	$check="select * from appointment where DoctorId='$DoctorId'";
	$run=mysqli_query($con,$check);
	$total=mysqli_num_rows($run);
	$count=0;
	while ($data=mysqli_fetch_assoc($run)) {
		if ($data['DoctorStatus']==4) {
			$count++;
		}
	}
	if ($count==$total) {
		$query="DELETE FROM doctor WHERE doctor.DoctorId = $DoctorId";
		$execute=mysqli_query($con,$query);
		if ($execute) {
			$_SESSION['dele']="Doctor deleted successfully...";
			header("Location:managedoctor.php");
		}
		else
		{
			if (mysqli_errno($con)) {
				$_SESSION['manerr']=mysqli_error($con);
					header("Location:managedoctor.php");
			}
		}
	}
	else
	{
		$_SESSION['manerr']="DOCTOR NOT DELETED BECAUSE SOME USER BOOK AN APPOINTMENT FOR THIS DOCTOR....";
		header("Location:managedoctor.php");
	}
	$count=0;
?>