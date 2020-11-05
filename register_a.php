<?php
	include("config/database.php");
	extract($_POST);
	$rs=mysqli_query($cn,"select * from mst_user where login='$lid'");
	if (mysqli_num_rows($rs)>0)
	{
		header('Location: register.php?stat=1');
		exit;
	}
	$query="INSERT INTO mst_user(login,pass,username,phone,email) values('$lid','$pass','$name','$phone','$email')";
	if(mysqli_query($cn, $query)){
		header('Location: index.php?stat=200');
		exit;
	}
?>