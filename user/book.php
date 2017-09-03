<?php 

header('content-type:text/html;charset=utf-8');

include '../database/config.php';

$experimentname = $_POST['experiment_name'];
$studentname = $_POST['student_name'];
$experimenttime = $_POST['experiment_time'];


$sql_isFull = "SELECT * FROM studentlist WHERE labName = '{$experimentname}' AND labTime ='{$experimenttime}'
";
$rst_isFull = $mysqli->query($sql_isFull);
$num = 0;
//$num = mysql_num_rows($row_isFull);
while ( $row_isFull=mysqli_fetch_assoc($rst_isFull)) {
							echo "<script>alert('loop')</script>";

	$num++;
}
// 在这里设置实验饱和人数
if($num<5){
						
	$rst = $mysqli->query($sql);

	$row = mysqli_fetch_assoc($rst);
						
		// 获得老师名字
		$sql = "SELECT teacher FROM experimentlist WHERE experimentname='{$experimentname}'";
		$rst = $mysqli->query($sql);
		while ($row=mysqli_fetch_assoc($rst)) {
		$teacherName = $row['teacher'];
		}

		// 获得该学生的学号 班级
		$sql="SELECT studentid,class FROM studentlist WHERE studentname='{$studentname}'";
		$rst=$mysqli->query($sql);
		while ($row=mysqli_fetch_assoc($rst)) {
			$studentid = $row['studentid'];
			$class=$row['class'];
		}
		
		$sql = "INSERT INTO studentlist (studentname,studentid,class,teacher,labName,labTime,$experimentname) VALUES ('{$studentname}','{$studentid}','{$class}','{$teacherName}','{$experimentname}','{$experimenttime}','1')";
	
	echo "<script>alert('{$sql}')</script>";

	$rst = $mysqli->query($sql);

	if ($rst) {
		echo "<script>alert('预约成功')</script>";
		echo "<script>location='student-main-select.php'</script>";
	}else {
		echo "<script>alert('updata fail')</script>";
		echo "<script>location='student-main-select.php'</script>";
	}

}else{
		echo "<script>alert('预约已满')</script>";
		echo "<script>location='student-main-select.php'</script>";
}
 ?>