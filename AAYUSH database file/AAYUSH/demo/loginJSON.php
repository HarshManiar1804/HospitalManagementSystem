<?php
	require_once("connectionforjson.php");
    $query="select Email,Password from user";
    $execute=mysqli_query($con,$query);
      $id=$_GET['id'];
    $pass=$_GET['pass'];
    $temp=1;
    while($data=mysqli_fetch_assoc($execute))
    {
    	if ($data['Email']==$id&&$data['Password']==$pass) {
    		$response[]= array('status' => "1");
			$response[]= array('id' => $data['Email']);
			$temp ++;
			break;
    	}
    }
  if ($temp == 1) {
		$response[]= array('status' => 0);
	}

	$json_data = json_encode($response);

	echo "$json_data";
?>