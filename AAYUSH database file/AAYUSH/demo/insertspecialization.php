<?php
	require_once("connection.php");
	session_start();
	$specialization=$_POST['Specialization'];
	$query="INSERT INTO doctorspecialization (DoctorSpecialicationID, Specialization, Remarks) VALUES (NULL,'$specialization', '')";
	$execute=mysqli_query($con,$query);
	if(isset($execute))
			{
				$_SESSION['depmsg']="Specialization Added successfully....";
				header("Location:Addspecialization.php");
				
			}

			else
			{
				if (mysqli_errno($con)) {
					$_SESSION['deperr']=mysqli_error($con);
				}
			
				header("Location:Addspecialization.php");
				
			}
?>