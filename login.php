<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>华北电力大学动力系实验管理系统</title>
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/login.css" />
</head>
<body>
	<div class="login-box">
		<div class="login-banner">
			<div rel="student" class="button choosen">学生登录</div>
			<div rel="teacher" class="button">教师登录</div>
		</div>
		<div class="floatClear"></div>
		<div class="login-body">
			<form id="student" class="input on" action="user/check.php" method="post">
				<div class="inputArea">
					<table>
						<tr>
							<td><input type="text" placeholder="学生姓名" name="studentname"/></td>
						</tr>
						<tr>
							<td><input type="text" placeholder="学号" name="studentid"/></td>
						</tr>
					</table>
				</div>
				<div class="login-button">
					<input type="hidden" name="logintime" value='<?php echo time(); ?>'/>
					<input type="submit" value="登录"/>
				</div>
			</form>
			<form id="teacher" class="input" action="user/check-teacher.php" method="post">
				<div class="inputArea">
					<table>
						<tr>
							<td><input type="text" placeholder="教师姓名" name="teachername"/></td>
						</tr>
						<tr>
							<td><input type="text" placeholder="学工号" name="teacherid"/></td>
						</tr>
					</table>
				</div>
				<div class="login-button"><input type="submit" value="登录"/></div>
			</form>
		</div>
		<div class="login-footer">
			<img src="./imges/logo.png" alt="华北电力大学" /></td>
					<td><div class="login-footer-text_1">动力系</div>
					<div class="login-footer-text_2">实验管理系统</div>
		</div>
	</div>
	<script src="plugin/jquery.js"></script>
	<script>
		$(document).ready(function(){

			$('.login-box').find('.button').on('click',function(){
				var formToShow = $(this).attr('rel');

				$('.button.choosen').removeClass('choosen');
				$(this).addClass('choosen');

				if (formToShow=='student') {
					$('#student').show();
					$('#teacher').hide();
				};
				if (formToShow=='teacher') {
					$('#student').hide();
					$('#teacher').show();
				}
				
			});
		});
	</script>
</body>
</html>