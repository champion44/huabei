<?php 

session_start();

header('content-type:text/html;charset=utf-8');

include '../database/config.php';

$teachername = $_SESSION['teachername'];

echo $teachername;
$studentname = $_POST['studentname'];
$studentid = $_POST['studentid'];
$class = $_POST['class'];

/*
$sql = "INSERT INTO `studentlist` ( `studentname`, `studentid`, `class`) values('{$studentname}','{$studentid}','{$class}')";
*/

$sql = "INSERT INTO `studentlist` (`id`, `studentname`, `studentid`, `class`, `teacher`, `contact`, `loginstatus`, `logintime`) VALUES ('10', '{$studentname}', '{$studentid}', '{$class}', '123', '0', '0', '0')";

$rst = $mysqli->query($sql);


if($rst) {
		echo "<script>alert('添加succ')</script>";
	echo "<script>location='teacher-main.php'</script>";
}
else {
	echo "<script>alert('添加失败')</script>";
	echo "<script>location='teacher-main.php'</script>";
}

 ?>