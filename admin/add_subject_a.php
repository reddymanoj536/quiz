<?php
	include '../config/database.php';
	include '../config/access.php';
	$sub_name=$_POST['sub_name'];
	$sub_id=$_POST['sub_id'];
	if($_POST['mode']==1){
		$duplicate=mysqli_query($cn,"select * from mst_subject where sub_name='$sub_name'");
		if (mysqli_num_rows($duplicate)>0)
		{
			header('Location: add_subject.php?status=201');
			exit();
		}
		$sql = "INSERT INTO mst_subject (sub_name)
		VALUES ('$sub_name')";
		if (mysqli_query($cn, $sql)) {
			header('Location: add_subject.php?status=200');
		}
	}
	if($_POST['mode']==2){
		$sql = "UPDATE `mst_subject` SET `sub_name`='$sub_name' WHERE sub_id=$sub_id";
		if (mysqli_query($cn, $sql)) {
			header('Location: subject_list.php?status=200');
		}
	}
?>