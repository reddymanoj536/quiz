<?php
	include '../../config/database.php';
	$id=$_POST['id'];
	$sql = "DELETE FROM `mst_user` WHERE user_id=$id";
	if (mysqli_query($cn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	}
?>