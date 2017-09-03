<?php 

include '../database/config.php';
session_start();

header('content-type:text/html;charset=utf-8');

$id = $_POST['experiment'];
$experimenttime = $_POST['experiment_time'];
$teachername = $_SESSION['teachername'];
//echo "<script>alert('{$teachername}')</script>";

if ($id == '') {
	echo "<script>alert('请选择您要删除的选项')</script>";
	echo "<script>location='teacher-main.php'</script>";
}else if($experimenttime==''){
echo "<script>alert('请选择您要删除的时间')</script>";
	echo "<script>location='teacher-main.php'</script>";
}else {
	foreach ($id as $eachid ) {
		// 在实验端删除该老师名下的该试验的时间
		$sql_getTime = "SELECT experimenttime FROM experimentlist WHERE id =$eachid";
		$rst_getTime = $mysqli->query($sql_getTime);
		$row_getTime = mysqli_fetch_assoc($rst_getTime);
		$timeArray = array();
		$timeArray=explode(" ",$row_getTime['experimenttime']);
		for ($i=0; $i < count($timeArray); $i++) { 
			if($experimenttime==$timeArray[$i]){
				array_splice($timeArray, $i,1);
			}
		}
		$newTime = implode(" ", $timeArray);
		echo "$newTime";
		$sql_deleteFromLab = "UPDATE experimentlist SET experimenttime = '{$newTime}' WHERE id = '{$eachid}'"; 
		$rst_deleteFromLab = $mysqli->query($sql_deleteFromLab);

		//根据id获得实验名称
		$sql = "SELECT * FROM experimentlist WHERE id=$eachid";
		$rst = $mysqli->query($sql);

		$row = mysqli_fetch_assoc($rst);
		$experimentname = $row['experimentname'];
		// 学生端将该老师门下该时间的该试验置为2状态 所谓逻辑删除
	    $sql_deleteFromStudent = "UPDATE studentlist SET $experimentname = 2 WHERE teacher='{$teachername}' and labName='{$experimentname}' and labTime='{$experimenttime}'";
	    $rst_sql_deleteFromStudent = $mysqli->query($sql_deleteFromStudent);
	   
	    $sql_count = "SELECT * FROM studentlist WHERE teacher='{$teachername}' and labName='{$experimentname}' and labTime='{$experimenttime}' and $experimentname = 2";
	    $rst_count = $mysqli->query($sql_count);
	    $num=0;
	    while ($row_count=mysqli_fetch_assoc($rst_count)) {
	    	$num++;
	    }
	    print_r($num);
	   // $row_count = mysql_fetch_assoc($rst_count);
}//foreach

echo "<script>location='teacher-main.php'</script>";
}//else

?>


