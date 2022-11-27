<?php 
	require_once("connectionforjson.php");

	$id = $_GET['DoctorSpecialicationID'];


	$temp = 1;

	$sql = "select * from doctor where DoctorSpecialicationID =$id";

	$result = mysqli_query($con, $sql);

	while($row = mysqli_fetch_assoc($result))
	{
		$new_data[]=array('DoctorId' =>  $row['DoctorId'],'DoctorName' =>  $row['DoctorName'],'DoctorPassword' =>  $row['DoctorPassword'],
	 		'DoctorFees' =>  $row['DoctorFees'],'ContactNo' =>  $row['ContactNo'],'DoctorEmail' =>  $row['DoctorEmail']);
	}
	/*if ($temp == 1) {
		$response[]= array('value' => 0);
	}*/

	$json_data = json_encode($new_data);

	echo "$json_data";


?>