<?php
	require_once("connection.php");
	session_start();
	$uname=$_POST['Username'];
	$pass=$_POST['password'];
	$query="select UserName,Password from admin";
	$execute=mysqli_query($con,$query);
	while ($data=mysqli_fetch_assoc($execute)) 
	{
		if ($uname==$data['UserName'] and $pass==$data['Password'] and $uname!="" and $pass!="") {
			$_SESSION['un']=$data['UserName'];
			header("Location:aayush.php");
			die();
		}
		else
		{
			$_SESSION['err']="USERNAME AND PASSWORD DOES NOT MATCH...";
			header("Location:loginfile.php");
		}
	}
?>