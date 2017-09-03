<?php 

include '../database/config.php';

header('content-type:text/html;charset=utf-8');

$id = $_POST['experiment'];

if ($id == '') {
	echo "<script>alert('请选择您要删除的选项')</script>";
	echo "<script>location='teacher-main.php'</script>";
}else {

	foreach ($id as $eachid ) {

		$sql = "SELECT * FROM experimentlist where id=$eachid";

		$rst = $mysqli->query($sql);

		$row = mysqli_fetch_assoc($rst);
		
		$experimentname = $row['experimentname'];

		$sql = "DELETE FROM experimentlist where id=$eachid";

		$rst = $mysqli->query($sql);

		if ($rst) {

			$sql = "ALTER TABLE `studentlist` DROP `{$experimentname}`";

			$rst = $mysqli->query($sql);
			
			echo "<script>alert('删除成功')</script>";
			echo "<script>location='teacher-main.php'</script>";
		}else {
			echo "<script>alert('删除失败')</script>";
			echo "<script>location='teacher-main.php'</script>";
		}

	}
}


