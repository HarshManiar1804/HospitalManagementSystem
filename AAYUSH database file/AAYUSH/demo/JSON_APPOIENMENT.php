<?php

	 $con=mysqli_connect("localhost","root","","aayush hospital");

	$query="SELECT AppointId,DoctorSpecialization,DoctorName,FullName,AppointmentDate,AppointmentTime,PostingDate,UserStatus,DoctorStatus FROM appointment ap,user u,doctor d where ap.DoctorId=d.DoctorId and ap.UserId=u.UserId";
	$execute=mysqli_query($con,$query);
	while ($row=mysqli_fetch_assoc($execute)) {
		$new_data[]=array('AppointId'=>$row['AppointId'],'DoctorSpecialization'=>$row['DoctorSpecialization'],'DoctorName'=>$row['DoctorName'],'FullName'=>$row['FullName'],'AppointmentDate'=>$row['AppointmentDate'],'AppointmentTime'=>$row['AppointmentTime'],'PostingDate'=>$row['PostingDate'],'UserStatus'=>$row['UserStatus'],'DoctorStatus'=>$row['DoctorStatus']);
	}
	$json_data=json_encode($new_data);
	 echo "$json_data";

?>