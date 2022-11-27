<?php
	
require_once("connectionforjson.php");
	$id=$_GET['EmailId'];
	 

	$query="SELECT * FROM files where UserEmail='$id'";
	$execute=mysqli_query($con,$query);
	while ($row=mysqli_fetch_assoc($execute)) {
		$new_data[]=array('ID'=>$row['ID'],'UserEmail'=>$row['UserEmail'],'ReportType' => $row['ReportType'],'PDF' => $row['PDFURL']);
	}
	$json_data=json_encode($new_data);
	 echo "$json_data";

?>