<?php
	require_once("connection.php");
	session_start();
	$specializationid=$_GET['DoctorSpecialicationID'];
	
	$query="DELETE FROM doctorspecialization WHERE doctorspecialization.DoctorSpecialicationID = $specializationid";
	$execute=mysqli_query($con,$query);
	if ($execute) {
		$_SESSION['spdele']="Specialization deleted successfully...";
		header("Location:managespecification.php");
	}
	else
	{

		if (mysqli_errno($con)) {
			$_SESSION['spmanerr']=mysqli_error($con);
		}
		header("Location:managespecification.php");
	}
?>