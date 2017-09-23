<?php 

session_start();

header('content-type:text/html;charset=utf-8');

include '../database/config.php';

$experimentname = $_POST['experimentname'];
$experimentlocation = $_POST['experimentlocation'];
$experimenttime = $_POST['experimenttime'];
$category = $_POST['category'];
$pdfurl = $_POST['PDF'];
$flashurl = $_POST['FLASH'];
$videourl = $_POST['VIDEO'];
$teachername = $_SESSION['teachername'];

$sql_exist = "SELECT experimenttime FROM experimentlist WHERE experimentname='{$experimentname}'";
$rst_exist = $mysqli->query($sql_exist);
$row_exist = mysqli_fetch_assoc($rst_exist);
if($row_exist['experimenttime']==""){
// 如果得到空 1新增实验 2并且在学生端增加column
// 1新增实验
	$sql_newLab = "INSERT INTO experimentlist (experimentname,experimentlocation,experimenttime,category,teacher) VALUES ('{$experimentname}','{$experimentlocation}','{$experimenttime}','{$category}','{$teachername}')";
	$rst_newLab = $mysqli->query($sql_newLab);
	if($rst_newLab){
		// 学生端新增字段
		$sql_addColumn = "ALTER TABLE `studentlist` ADD `{$experimentname}` INT(10) NOT NULL DEFAULT '0' ";
		$rst_addColumn = $mysqli->query($sql_addColumn);
		echo "<script>alert('新增成功')</script>";
			echo "<script>location='teacher-main.php'</script>";
	}else{
		echo "<script>alert('新增失败-1')</script>";
	echo "<script>location='teacher-main.php'</script>";
	}
}else{
	$append = $row_exist['experimenttime'].' '.$_POST['experimenttime'];
echo "<script>alert('{$append}')</script>";


$sql_insert = "UPDATE experimentlist SET experimenttime = '{$append}' WHERE experimentname='{$experimentname}'";

$rst_insert = $mysqli->query($sql_insert);

// if ($rst_insert) {
// 	$sql = "ALTER TABLE `studentlist` ADD `{$experimentname}` INT(10) NOT NULL DEFAULT '0' ";

// 	$rst = $mysqli->query($sql);


// 	if ($rst) {
// 		echo "<script>location='teacher-main.php'</script>";
// 	}
// 	else {
// 		echo "<script>alert('已存在')</script>";
// 		echo "<script>location='teacher-main.php'</script>";
// 	}
// }
if($rst_insert){
	echo "<script>alert('添加成功')</script>";
	echo "<script>location='teacher-main.php'</script>";

}else {
	echo "<script>alert('添加失败-1')</script>";
	echo "<script>location='teacher-main.php'</script>";
}

}//不为空的else

 ?>