<?php
	include '../../config/database.php';
	$id=$_POST['id'];
	$sql = "DELETE FROM `mst_test` WHERE test_id=$id";
	if (mysqli_query($cn, $sql)) {
		$sql = "DELETE FROM `mst_question` WHERE test_id=$id";
		if (mysqli_query($cn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		}
	}
?>