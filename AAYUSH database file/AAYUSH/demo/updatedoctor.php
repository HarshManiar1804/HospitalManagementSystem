<?php
	require_once("connection.php");
	session_start();
	$did=$_SESSION['doctoridforedit'];
	unset($_SESSION['doctoridforedit']);
	$dname=$_POST['DoctorName'];
	$dpass=$_POST['DoctorPassword'];
	$dsid=$_POST['DoctorSpecialicationID'];
	$dfees=$_POST['DoctorFees'];
	$dphone=$_POST['ContactNo'];
	$demail=$_POST['DoctorEmail'];
	$query="UPDATE doctor SET DoctorName = '$dname', DoctorPassword='$dpass',DoctorSpecialicationID='$dsid',DoctorFees='$dfees',ContactNo='$dphone',DoctorEmail='$demail' WHERE doctor.DoctorId = $did";
	$execute=mysqli_query($con,$query);
		if (mysqli_errno($con)) {
					$_SESSION['upddoc']=mysqli_error($con);
					header("Location:managedoctor.php");
					die();
					
		}
		else
		{
			$_SESSION['edit']="Doctor Details Updated Successfully..";
			header("Location:managedoctor.php");
		}

?>