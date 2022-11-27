<?php
	require_once("connection.php");
	session_start();
	$spid=$_SESSION['speidforedit'];
	unset($_SESSION['speidforedit']);
	$spname=$_POST['Specialization'];
	
	$query="UPDATE doctorspecialization SET Specialization = '$spname' WHERE doctorspecialization.DoctorSpecialicationID = $spid";
	$execute=mysqli_query($con,$query);


		if (mysqli_errno($con)) {
					echo $_SESSION['updspe']=mysqli_error($con);
				header("Location:managespecification.php");
					
					
		}
		else
		{
			echo $_SESSION['editspe']="Specialization Details Updated Successfully..";
			header("Location:managespecification.php");
		}
?>