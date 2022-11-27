<?php

	 $con=mysqli_connect("localhost","root","","aayush hospital");

	$query="SELECT * FROM report_types";
	$execute=mysqli_query($con,$query);
	while ($row=mysqli_fetch_assoc($execute)) {
		$new_data[]=array('ReportID'=>$row['Report_ID'],'ReportType'=>$row['ReportType']);
	}
	$json_data=json_encode($new_data);
	 echo "$json_data";

?>