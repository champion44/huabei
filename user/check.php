<?php


include '../database/config.php';

session_start();

$studentname = $_POST['studentname'];
$studentid = $_POST['studentid'];
$logintime = $_POST['logintime'];

$sql = "SELECT * FROM `studentlist` where studentname='{$studentname}' and
studentid='{$studentid}'";

$rst = $mysqli->query($sql);

$row = mysqli_fetch_assoc($rst);

$sql = "UPDATE `studentlist` set logintime='{$logintime}' where id='{$row['id']}'";

$mysqli->query($sql);

if($row) {
	$_SESSION['studentname'] = $studentname;
	$_SESSION['id'] = $row['id'];	

	if(!$row['loginstatus']) {
		echo "<script>location='infoPage.php'</script>";
	}
	else{
		echo "<script>location='student-main-select.php'</script>";
	}
}
else {
	echo "<script>alert('You inputed the wrong name or ID')</script>";
	echo "<script>location='../login.php'</script>";
}

?>