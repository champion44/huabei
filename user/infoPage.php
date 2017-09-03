<?php 

session_start();

include "../database/config.php";

$id = $_SESSION['id'];


$sql = "SELECT * FROM `studentlist` where id={$id}";

$rst = $mysqli->query($sql);

$row = mysqli_fetch_assoc($rst);


 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>请完善您的信息</title>
	<link rel="stylesheet" href="../css/reset.css" />
	<link rel="stylesheet" href="../css/infoPage.css" />
</head>
<body>
	<div class="main">
		<div class="banner">
			<div><img src="../imges/logo.png" alt="" /></div>
			<div><span>动力工程系</span></div>
		</div>
		<div class="body">
			<div class="headstate">
				<div class="name">您好，<?php  echo $_SESSION['studentname']?> 同学</div>
				<div class="menu">
					<ul>
						<li><a href="logout.php">退出系统</a></li>
					</ul>
				</div>
			</div>
			<div class="floatClear"></div>	
			<div class="distanceEffect"></div>
			<form action="update.php" method="post">
				<div class="infoTable">
					<table>
						<tr>
							<th colspan="2">
								<?php 
									if(!$row['loginstatus']) {
										echo "<p>您好，初次登录请完善您的信息</p>";
									}
									else {
										echo "<p>您好，请修改您的信息</p>";
									}
								 ?>
							</th>
						</tr>
						<tr>
							<th>姓名：</th>
							<th><input type="text" name="studentname" value='<?php echo $row['studentname']; ?>'/></th>
						</tr>
						<tr>
							<th>学号：</th>
							<th><input type="text" name="studentid" value='<?php echo $row['studentid']; ?>'/></th>
						</tr>
						<tr>
							<th>班别：</th>
							<th><input type="text" name="class" value='<?php echo $row['class']; ?>'/></th>
						</tr>
						<tr>
							<th>任课老师：</th>
							<th><input type="text" name="teacher" value='<?php echo $row['teacher']; ?>'/></th>
						</tr>
						<tr>
							<th>联系方式：</th>
							<th><input type="text" name="contact" value='<?php echo $row['contact']; ?>'/></th>
						</tr>
						<tr>
							<input type="hidden" name="id" value='<?php echo $id ?>'/>
							<input type="hidden" name="loginstatus" value='1'/>
							<th colspan="2"><input class="submit" type="submit" value="提           交"/></th>
						</tr>
					</table>
				</div>
			</form>
			<br />
			<br />
			<br />
			<div class="footer">
				<p>&copy;版权所有</p>
			</div>
		</div>
	</div>
</body>
</html>