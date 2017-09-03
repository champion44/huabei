<?php 

session_start();

include '../database/config.php';

$id = $_POST['id'];
$studentname = $_POST['studentname'];
$studentid = $_POST['studentid'];
$class = $_POST['class'];
$teacher = $_POST['teacher'];
$contact = $_POST['contact'];
$loginstatus = $_POST['loginstatus'];

$sql = "UPDATE `studentlist` set studentname='{$studentname}' , studentid='{$studentid}' , class='{$class}' , teacher='{$teacher}' , contact='{$contact}' , loginstatus='{$loginstatus}' where id='{$id}'";

$rst = $mysqli->query($sql);

if($rst) {
	$_SESSION['studentname'] = $studentname;
	echo "<script>alert('修改成功')</script>";
	echo "<script>location='student-main-select.php'</script>";
}
else {
	echo "<script>alert('修改失败，请重试')</script>";
	echo "<script>location='infoPage.php'</script>";
}

 ?>