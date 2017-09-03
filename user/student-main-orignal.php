<?php 


session_start();

header('content-type:text/html;charset=utf-8');


if (!$_SESSION['id']) {
		echo "<script>location='../login.php'</script>";
}

include '../database/config.php';


$studentname = $_SESSION['studentname'];


$sql_student = "SELECT * FROM studentlist WHERE studentname='{$studentname}'";


$rst_student = $mysqli->query($sql_student);

$row_student = mysqli_fetch_assoc($rst_student);



 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>欢迎登录</title>
	<link rel="stylesheet" href="../css/reset.css" />
	<link rel="stylesheet" href="../css/student-main.css" />



    <!-- plugin css-->
	<link rel="stylesheet" type="text/css" href="../css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="../css/menu-wrap.css" />

	<!--Tiltle css-->
	<link rel="stylesheet" type="text/css" href="../css/wave_button.css">


	<!-- Widget css-->
	<link rel="stylesheet" type="text/css" href="../css/widget.css">

	<!-- PDF css -->
	<link rel="stylesheet" type="text/css" href="../css/pdf.css">

	<!--video css-->
	<link rel="stylesheet" type="text/css" href="../css/fz-video-initial.css">
	<link rel="stylesheet" href="../css/fz-video.css">
	<link rel="stylesheet" href="../font/iconfont.css">


	<!--Flash css-->
	<link rel="stylesheet" type="text/css" href="../css/flash.css">



	<!-- Homework css-->
	<link rel="stylesheet" type="text/css" href="../css/homework.css">


	<!--必要样式-->
	<link rel="stylesheet" type="text/css" href="../css/menu_sideslide.css" />
</head>
<body>



	<div class="menu-wrap" id="insert">
		<nav class="menu">
				<div class="icon-list">

				<div class="title">
				<ul class="wave_button_ul">
				<li rel="PDF">PDF</li>
				<li rel="VIDEO">VIDEO</li>
				<li rel="FLASH">FLASH</li>
				<li class="slide"></li>
				</ul>

				</div>
				<div class="widget">

				<!--PDF part-->
				<div class="view_pdf chossen">
				<div class="pdf_content" id="pdf_content">
				<embed src="" type="application/pdf" />
				</div>
				</div>
				<!--The end of the PDF Part -->

				<!--Video part-->
				<div class="view_video">
				<div class="video_content" id="video_content">
					<video id="video" controls>
						<source src=<?php echo $videourl; ?> type="video/mp4">
						<object data="movie.mp4" width="100%" height="100%">
							<embed width="320" height="240" src="">
						</object>
					</video>
				<!--div id="testBox">
					
				</div-->
				</div>
				</div>
				<!--The end of the Video Part -->

				<!--Flash part-->
				<div class="view_flash">
				<div class="flash_content" id="flash_content">
				<embed   src="" type="application/x-shockwave-flash" />
				</div>
				</div>
				<!--The end of the Flash Part -->
				</div>

				<div class="view_homework">
				<div class="homework_title">HOMEWORK</div>
				<div class="homework_content">
				<div class="statments">请根据左边的实验指导书、实验演示视频以及实验Flash动画，完成以下习题</div>
				<form id="homeworkTable">
					<table>
						<tr>
							<td>
								<div id="first_question">First Question</div>
							</td>

						</tr>
						<tr>
							<td>
								<textarea id="First_Answer" name="First_Answer" placeholder="Here is the answer area.Please text here."></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<div id="second_question">Second Question</div>
							</td>

						</tr>
						<tr>
							<td>
								<textarea id="Second_Answer" name="Second_Answer" placeholder="Here is the answer area.Please text here."></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<div id="third_question">Third Question</div>
							</td>

						</tr>
						<tr>
							<td>
								<textarea id="Third_Answer" name="Third_Answer" placeholder="Here is the answer area.Please text here."></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<input type="hidden" name="studentname" value=<?php  echo $_SESSION['studentname']?>>
								<div id="experiment_hidden_data"></div>
								<input class="submit_button" id="submit_button" type="submit" name="提交" >
							</td>
						</tr>
					</table>

				</form>
				</div>
				</div>

			</div>
		</nav>
	</div>




	<div class="main">
		<div class="banner">
			<div><img src="../imges/logo.png" alt="" /></div>
			<div><span>动力工程系</span></div>
		</div>
		<div class="body">
			<div class="headstate">
				<div class="name">您好，<?php  echo $_SESSION['studentname']?> 同学</div>
				<div class="menu">
						<div id="insert" class="logout"><a href="logout.php">退出系统</a></div>
						<div class="changeInfo"><a href="infoPage.php">修改信息</a></div>
				</div>
			</div>
			<div class="floatClear"></div>
			<p>您有以下课程有相关实践实验环节：</p>
			<div class="experiment">
				<h3>泵与风机</h3>
				<hr />
				<table >
					<tr>
						<th>实验名称</th>
						<th>实验地点</th>
						<th>实验时间</th>
						<th>状态</th>
					</tr>
					<?php 

						$sql_experiment = "SELECT * FROM experimentlist WHERE category='泵风' and experimentname='离心式风机实验'";

						$rst_experiment = $mysqli->query($sql_experiment);

						while($row_experiment = mysqli_fetch_assoc($rst_experiment)) {

							$experimentname = $row_experiment['experimentname'];
							
							echo "<tr>";
							echo "<th>{$row_experiment['experimentname']}</th>";
							echo "<th>{$row_experiment['experimentlocation']}</th>";
							echo "<th>{$row_experiment['experimenttime']}</th>";
							if($row_student[$experimentname] == 0){
								echo "<th>";
								echo "<form name='book-form' id='book-form' action='book.php' method='post'>";
								// 通过隐藏表单将学生信息携带，传入表单
								echo "<input type='hidden' name='experiment_name' value=$experimentname>";
								echo "<input type='hidden' name='student_name' value={$row_student['studentname']}>";
								echo "<input class='book-button' type='submit' value='预约'>";
								echo "</form>";
								echo "</th>";
							}

							else if($row_student[$experimentname] == 1) {
								echo "<th>";
								echo "<input type='hidden' name='experiment_name' value=$experimentname>";
								echo "<input type='hidden' name='student_name' value={$row_student['studentname']}>";
								echo "<div " . "rel='" . $experimentname . "' " . "class='learn-button' id='open-button' >学 习</div>";
								echo "</th>";
							}

							else if($row_student[$experimentname] == 2) {
								echo "<input class='unfinish-button' type='submit' value='未完成'>";
							}

							echo "</tr>";
						}	
							
					 ?>
				</table>
			</div>
			<div class="distanceEffect"></div>
			<!--div class="experiment">
				<h3>流体力学</h3>
				<hr />
				<table >
					<tr>
						<th>实验名称</th>
						<th>实验地点</th>
						<th>实验时间</th>
						<th>状态</th>
					</tr>
					<?php 

						$sql_experiment = "SELECT * FROM experimentlist WHERE category='流体'";

						$rst_experiment = $mysqli->query($sql_experiment);

						while($row_experiment = mysqli_fetch_assoc($rst_experiment)) {

							$experimentname = $row_experiment['experimentname'];
							
							echo "<tr>";
							echo "<th>{$row_experiment['experimentname']}</th>";
							echo "<th>{$row_experiment['experimentlocation']}</th>";
							echo "<th>{$row_experiment['experimenttime']}</th>";
							if($row_student[$experimentname] == 0){
								echo "<th>";
								echo "<form name='book-form' id='book-form' action='book.php' method='post'>";
								echo "<input type='hidden' name='experiment_name' value=$experimentname>";
								echo "<input type='hidden' name='student_name' value={$row_student['studentname']}>";
								echo "<input class='book-button' type='submit' value='预约'>";
								echo "</form>";
								echo "</th>";
							}
							else if($row_student[$experimentname] == 1) {
								echo "<th>";
								echo "<form name='learn-form' id='learn-form' action='student_learn.php' method='post'>";
								echo "<input type='hidden' name='experiment_name' value=$experimentname>";
								echo "<input type='hidden' name='student_name' value={$row_student['studentname']}>";
								echo "<input class='learn-button' type='submit' value='学习'>";
								echo "</form>";
								echo "</th>";
							}
							else if($row_student[$experimentname] == 2) {
								echo "<th><div class='unfinish-button'>未完成</div></th>";
							}

							echo "</tr>";
						}	
							
					 ?>
				</table>
			</div-->
		</div>
		<div class="footer">
			<p>&copy;版权所有</p>
		</div>
	</div>

	<script src="../plugin/jquery.js"></script>

	<script src="../js/jquery.min.js"></script>

	<script src="../js/classie.js"></script>
	<script src="../js/main.js"></script>

	<!-- show the menu-wrap-->

	<script src="../js/insertWrap.js"></script>
	<script src="../js/insertQuestion.js"></script>
	<script src="../js/insertAnswer.js"></script>

	<!--Widget js-->
	<script src="../js/widget.js"></script>

	<!--Video Plugin>
	<script src="../js/fz-video.js"></script>

	<script src="../js/fz-video-url.js"></script>
	< The End of the Video Plugin-->

	<script src="../js/wave_button.js"></script>



	<script type="text/javascript">

		$(document).ready(function(){

			$('.experiment').find('.learn-button').on('click',function(){

				var $experimentname = $(this).attr('rel');

				getExperimentInfo($experimentname,this);

				setVIDEO();
				setVIDEOurl();

			});


			$('.homework_content').find('.submit_button').on('click',function(){

				$.ajax({

						cache: true,
		                type: "POST",
		                url:"../user/uploadhomework.php",
		                data:$('#homeworkTable').serialize(),// 你的formid
		                async: false,
		                error: function(request) {
		                    alert("Submit Fails");
		                },
		                success: function(data) {
		                    alert("Submit Success");
		                }

					});

			});
		});


	</script>

</body>
</html>