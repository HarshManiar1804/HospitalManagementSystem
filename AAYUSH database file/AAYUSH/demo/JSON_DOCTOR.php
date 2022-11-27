<?php
	 $con=mysqli_connect("localhost","root","","aayush hospital");
	 if(!$con)
	 {
	 	echo "Something went wrong!!!!!";
	 }
	 $query="SELECT DoctorId,DoctorName,DoctorPassword,Specialization,DoctorFees,ContactNo,DoctorEmail FROM doctor d,doctorspecialization s where d.DoctorSpecialicationID=s.DoctorSpecialicationID";
	 $execue=mysqli_query($con,$query);
	 while($row=mysqli_fetch_assoc($execue)){
	 	$new_data[]=array('DoctorId' =>  $row['DoctorId'],'DoctorName' =>  $row['DoctorName'],'DoctorPassword' =>  $row['DoctorPassword'],
	 		'Specialization' =>  $row['Specialization'],'DoctorFees' =>  $row['DoctorFees'],'ContactNo' =>  $row['ContactNo'],'DoctorEmail' =>  $row['DoctorEmail']);
	 }
	 $json_data=json_encode($new_data);
	 echo "$json_data";
?>