<?php

	 require_once("connectionforjson.php");

	$query="SELECT * FROM doctorspecialization";
	$execute=mysqli_query($con,$query);
	while ($row=mysqli_fetch_assoc($execute)) {
		$new_data[]=array('DoctorSpecialicationID'=>$row['DoctorSpecialicationID'],'Specialization'=>$row['Specialization']);
	}
	$json_data=json_encode($new_data);
	 echo "$json_data";

?>