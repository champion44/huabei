<?php

session_start();

include '../database/config.php';

$teachername = $_POST['teachername'];
$teacherid = $_POST['teacherid'];

$sql = "SELECT * FROM `teacherlist` where teachername='{$teachername}' and teacherid='{$teacherid}'";

$rst = $mysqli->query($sql);

$row = mysqli_fetch_assoc($rst);


if($row) {
	$_SESSION['teachername'] = $teachername;
	$_SESSION['id'] = $row['id'];
	echo "<script>location='teacher-main.php'</script>";
}
else {
	echo "<script>alert('You inputed the wrong name or ID')</script>";
	echo "<script>location='../login.php'</script>";
}

?>