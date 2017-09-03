	<?php 


	session_start();


	if (!$_SESSION['id']) {
		echo "<script>location='../login.php'</script>";
	}

	include '../database/config.php';

	$teachername = $_SESSION['teachername'];


	$sql_student = "SELECT * FROM studentlist where teacher='$teachername'";

	$rst_student = $mysqli->query($sql_student);

	//$sql_experiment = "SELECT * FROM experimentlist ORDER BY experimentname";
	$sql_experiment = "SELECT * FROM experimentlist WHERE teacher = '{$teachername}'";
	$rst_experiment = $mysqli->query($sql_experiment);


	date_default_timezone_set("ETC/GMT-8");

	?>
	<div id="content">
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>欢迎登录</title>
			<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
			<link rel="stylesheet" type="text/css" href="stylesheets/reset.css">
			<link rel="stylesheet" type="text/css" href="stylesheets/normalize.css" media="screen">
			<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
			<link rel="stylesheet" type="text/css" href="stylesheets/stylesheet.css" media="screen">
			<link rel="stylesheet" type="text/css" href="stylesheets/github-light.css" media="screen">
			<link rel="stylesheet" href="../css/reset.css" />
			<link rel="stylesheet" href="../css/teacher-main.css" />
			<script>

				function submitit (){



					var insert_info = document.getElementById("insert_info");
					var upload_file = document.getElementById("upload_file");

					setTimeout("insert_info.submit()",0);
					setTimeout("upload_file.submit()",1000);
				}
			</script>
		</head>
		<body>
			<div class="main">
				<div class="banner">
					<div><img src="../imges/logo.png" alt="" /></div>
					<div><span>动力工程系</span></div>
				</div>
				<div class="body">
					<div class="headstate">
						<div class="name">您好，<?php  echo $_SESSION['teachername']?> 老师</div>
						<div class="menu">
							<ul>
								<li><a href="logout.php">退出系统</a></li>
							</ul>
						</div>
						<div class="floatClear"></div>
						<div class="container">
							<ul class="options">
								<li rel="experiment" class="button on">实验</li>
								<li rel="student" class="button">学生</li>
							</ul>
							<div id="experiment" class="experiment-box">
								<div class="experiment-list">
									<form action="delete-experiment-demo.php" method="post">
										<div class="experiment-menu">
											<ul>
												<li class="add-experiment">添加实验</li>
												<li><input type="submit" value="删除"/></li>
											</ul>
										</div>
										<div  class="experiment-body">
											<div class="itemname">
												<ul class="title">
													<li class="option-button"></li>
													<li>实验名称</li>
													<li>实验地点</li>
													<li>实验时间</li>
													<li>类别</li>
													<li>已选</li>
												</ul>
												<div class="list-box">
													<?php 
													while($row_experiment = mysqli_fetch_assoc($rst_experiment)) {
														$experimentname=$row_experiment['experimentname'];
														$time = array();
														$time=explode(" ",$row_experiment['experimenttime']);	
														sort($time);
														echo "<ul class='subtitle'>";
														echo "<li class='option-button'><input type='checkbox' name='experiment[]' value='{$row_experiment['id']}'></li>";
														echo "<li >{$row_experiment['experimentname']}</li>";
														echo "<li>{$row_experiment['experimentlocation']}</li>";
														echo "<input type='hidden'  class='vitalTime' name='experiment_time' value=''>";
														echo "<li class='vitalTime'><SELECT class='selectItem'>
														<option $select0> {$time[0]}</option>
														<option $select1> {$time[1]}</option>
														<option $select2> {$time[2]}</option>
														<option $select3> {$time[3]}</option>
														<option $select4> {$time[4]}</option>
														<option $select5> {$time[5]}</option>
													</SELECT></li>";
													echo "<li>{$row_experiment['category']}</li>";
													echo "<li class='remain'>{$_SESSION['num']}</li>";
													echo "</ul>";
											}	//while
											?>
										</form>
										<form action="insert-experiment-info.php" method="post">
											<div  class="new-experiment">
												<ul>
													<li><input type="text" name="experimentname" placeholder="实验名称"/> </li>
													<li><input type="text" name="experimentlocation" placeholder="实验地点"/></li>
													<li><input id="picker3" type="text" name="experimenttime" placeholder="实验时间"/></li>
													<li><input type="text" name="category" placeholder="类别"/></li>
												</ul>
												<table class="add-file" >
													<tr><th colspan="4">PDF:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="PDF"/></th></tr>
													<tr><th colspan="4">FLASH:&nbsp;<input type="file" name="FLASH"/></th></tr>
													<tr><th colspan="4">VIDEO:&nbsp;<input type="file" name="VIDEO"/></th></tr>
													<tr>
														<th ><input type="submit" class="add-button" value="添加" /></th>
													</tr>
												</table>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div id="student" class="student-box">
						<div class="student-menu">
							<ul>
								<li class="add-student">添加学生</li>
								<li>导出成绩</li>
							</ul>
						</div>
						<div class="student-body">
							<div class="itemname">
								<ul>
									<li>姓名</li>
									<li>学号</li>
									<li>班别</li>
									<li>最近登录时间</li>
								</ul>
								<div class="list-box">
									<?php 
									while($row_student = mysqli_fetch_assoc($rst_student)) {
										echo "<ul>";
										echo "<li rel='{$row_student['id']}'>{$row_student['studentname']}</li>";
										echo "<li  rel='{$row_student['id']}'>{$row_student['studentid']}</li>";
										echo "<li  rel='{$row_student['id']}'>{$row_student['class']}</li>";
										echo "<li  rel='{$row_student['id']}'>".date('Y-m-d H:i:s',$row_student['logintime'])."</li>";
										echo "</ul>";
									}	
									?>
									<form action="insert-student.php" method="post">
										<ul class="new-student">
											<li><input type="text" name="studentname" placeholder="学生姓名"/></li>
											<li><input type="text" name="studentid" placeholder="学号"/></li>
											<li><input type="text" name="class" placeholder="班别"/></li>
											<li><input type="submit" class="add-button" value="添加"/></li>
										</ul>
									</form>
								</div>
							</div>
						</div>

						<div class="student-mask">

						</div>
						<div class="student-detail">
							<table>
								<thead>
									<tr>
										<th style="width:15%;"></th>
										<th style="width:15%;"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><label>姓名：</label><span id="detail_name"></span></td>
										<td><label>学号：</label><span id="detail_id"></span></td>
									</tr>
									<tr>
										<td><label>班级：</label><span id="detail_class"></span></td>
										<td><label>联系方式：</label><span id="detail_contact"></span></td>
									</tr>
									<tr >
										<td colspan="2"><label>实&nbsp&nbsp&nbsp&nbsp验</label></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="floatClear"></div>
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
		</div>
		<div class="footer">
			<p>&copy;版权所有</p>
		</div>
	</div>
	<script src="../plugin/jquery.js"></script>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/getStudentDetail.js"></script>
	<script src="../js/setStudentBaseInfo.js"></script>
	<script src="../js/setStudentExperimentInfo.js"></script>
	<script src="../js/initialStudentExperimentInfo.js"></script>
	<script >

		$(document).ready(function(){
			$('.selectItem').on('click',function(){
				$('.vitalTime').val(this.value);
				var selectTime = this.value;
				$.ajax({
					url: "teacher-main.php", 
					type: "GET",
					data: {gjj:selectTime},
					error: function(){ 
						alert('Error'); 
					}, 
					success: function(data){
						$('#content').html(data);
						console.log(data);
						location.reload();
					}
				});
				var glob = "<?php	
				$gjj = $_GET['gjj'];
				$sql_count = "SELECT * FROM studentlist where labName = '{$experimentname}' and labTime ='{$gjj}'";
				$rst_count = $mysqli->query($sql_count);
				$num=0;
				while ($row_count=mysqli_fetch_assoc($rst_count)) {
					$num++;
				}
				echo $num;
				session_start();
				$_SESSION['num']=$num;
				?>";
				$('.remain').text(glob);
			});

			$('.options').find('.button').on('click', function(){
				var buttonToChange = $(this).attr('rel');
				$(this).closest('.options').find('.on').removeClass('on');
				$(this).addClass('on');

				if (buttonToChange=='experiment') {
					$('#experiment').show();
					$('#student').hide();
				};
				if (buttonToChange=='student') {
					$('#experiment').hide();
					$('#student').show();
				}

			});
			
			
			$('.student-menu').find('.add-student').on('click' , function(){

				$('.new-student').fadeToggle();
			});

			$('.experiment-menu').find('.add-experiment ').on('click' , function(){

				$('.new-experiment').fadeToggle();
			});


			$('.list-box').find('li').on('click',function(){

				var $idOfStudent = $(this).attr('rel');


				getStudentDetail($idOfStudent);


				$('.student-mask').fadeIn();
				$('.student-detail').fadeIn();
			});


			$('.student-mask').on('click',function(){


				$(this).fadeOut();

				
				$('.student-detail').fadeOut();

				initialStudentExperimentInfo();
				
			});
		});

	</script>
</body>
<script src="scripts/picker.min.js"></script>
<script>
	var data1 = [
	{
		text: '1',
		value: 1
	}, {
		text: '2',
		value: 2
	},
	{
		text: '3',
		value: 3
	},
	{
		text: '4',
		value: 4
	},
	{
		text: '5',
		value: 5
	},
	{
		text: '6',
		value: 6
	},
	{
		text: '7',
		value: 7
	}, {
		text: '8',
		value: 8
	},
	{
		text: '9',
		value: 9
	},
	{
		text: '10',
		value: 10
	},
	{
		text: '11',
		value: 11
	},
	{
		text: '12',
		value: 12
	},
	{
		text: '13',
		value: 13
	},
	{
		text: '14',
		value: 14
	},
	{
		text: '15',
		value: 15
	},
	{
		text: '16',
		value: 16
	},
	{
		text: '17',
		value: 17
	},
	{
		text: '18',
		value: 18
	},
	{
		text: '19',
		value: 19
	},
	{
		text: '20',
		value: 20
	},
	{
		text: '21',
		value: 21
	},
	{
		text: '22',
		value: 22
	},
	{
		text: '23',
		value: 23
	},
	{
		text: '24',
		value: 24
	},
	{
		text: '25',
		value: 25
	},
	{
		text: '26',
		value: 26
	},
	{
		text: '27',
		value: 27
	},
	{
		text: '28',
		value: 28
	},
	{
		text: '29',
		value: 29
	},
	{
		text: '30',
		value: 30
	},
	{
		text: '31',
		value: 31
	}
	];

	var data2 = [
	{
		text: '上午',
		value: '上午'
	}, {
		text: '下午',
		value: '下午'
	}
	];

	var data3 = [
	{
		text: '08:00-10:00',
		value: '08:00-10:00'
	}, {
		text: '10:00-12:00',
		value: '10:00-12:00'
	},
	{
		text: '14:00-16:00',
		value: '14:00-16:00'
	},
	{
		text: '16:00-18:00',
		value: '16:00-18:00'
	}
	];

	var picker3El = document.getElementById('picker3');

	var picker3 = new Picker({
		title: '选择实验日期',
		data: [data1, data2, data3]
	});

	picker3.on('picker.select', function (selectedVal, selectedIndex) {
		$("#picker3").val(data1[selectedIndex[0]].text + '号' + data2[selectedIndex[1]].text  + data3[selectedIndex[2]].text);
	});

	picker3.on('picker.change', function (index, selectedIndex) {
		console.log(index);
	});

	picker3.on('picker.valuechange', function (selectedVal, selectedIndex) {
		console.log(selectedVal);
	});

	picker3El.addEventListener('click', function () {
		picker3.show();
	});

	var data = [data1, data2, data3];
	var index = 0;

</script>
</html>	
</div>