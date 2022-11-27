<?php
	require_once("connection.php");
	session_start();
	$dname=$_POST['DoctorName'];
	$dpass=$_POST['DoctorPassword'];
	$dsid=$_POST['DoctorSpecialicationID'];
	$dfees=$_POST['DoctorFees'];
	$dphone=$_POST['ContactNo'];
	$demail=$_POST['DoctorEmail'];

	

	
	
		$query="INSERT INTO doctor (DoctorId, DoctorName, DoctorPassword, DoctorSpecialicationID, DoctorFees, ContactNo, DoctorEmail, Remarks) VALUES (NULL,'$dname','$dpass','$dsid','$dfees','$dphone','$demail','')";


		
			$excute=mysqli_query($con,$query);
			if($excute)
			{
				echo $_SESSION['msg']="doctor insert successfully....";
				header("Location:Adddoctor.php");
				
			}

			else
			{
				if (mysqli_errno($con)) {
					echo $_SESSION['errins']=mysqli_error($con);
				}
			
				header("Location:Adddoctor.php");
			}
	
	
?>