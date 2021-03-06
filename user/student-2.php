<?php 


session_start();


if (!$_SESSION['id']) {
		echo "<script>location='../login.php'</script>";
}


 ?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>华北电力大学动力工程系实验管理系统</title>
	<link rel="stylesheet" href="../css/reset.css" />
	<link rel="stylesheet" href="../css/student-1.css" />
</head>
<body>
	<div class="main">
		<div class="banner">
			<div><img src="../imges/logo.png" alt="" /></div>
			<div><span>动力工程系</span></div>
		</div>
		<div class="body">
			<div class="headstate">
				<div class="back"><a href="student-main.php">返回</a></div>
				<div class="menu">
					<ul>
						<li><a href="logout.php">退出系统</a></li>
					</ul>
				</div>
			</div>
			<div class="floatClear"></div>
			<div class="distanceEffect"></div>

			<div class="main-part">
				<p>离心式水泵性能实验</p>
				<div class="viewer-box-out-style-1">
					<div><img src="../imges/stylechange.png" alt="NCEPU" rel="1"/></div>
					<ul>
						<li rel="slides" class="active">Slides</li>
						<li rel="video">Video</li>
						<li rel="flash">Flash</li>
					</ul>
						<div class="floatClear"></div>
						<div class="viewer-box-inner">
							<embed id="slides" class="box active" src="../files/离心式水泵性能实验.pdf" type="application/pdf" />
							<video id="video" class="box" src="../files/离心式水泵性能实验.mp4"></video>
							<embed id="flash" class="box" src="../files/离心式水泵性能实验.swf" type="application/x-shockwave-flash" />
						</div>
				</div>
				<div class="viewer-box-out-style-2">
					<div><img src="../imges/stylechange.png" alt="NCEPU" /></div>
					<div class="viewer-sildes-2">
						<div class="slides">Slides</div>
						<embed class="viewer-sildes" src="../files/离心式水泵性能实验.pdf" type="application/pdf" />
					</div>
					<div class="viewer-flash-2">
						<div class="flash">Flash</div>
						<embed  class="viewer-flash" src="../files/离心式水泵性能实验.swf" type="application/x-shockwave-flash" />
					</div>
					<div class="viewer-video-2">
						<div class="video">Video</div>
						<video class="viewer-video" src="../files/离心式水泵性能实验.mp4"></video>
					</div>
				</div>
				<div class="floatClear"></div>
			</div>
			<div class="distanceEffect"></div>
		</div>
		<div class="footer">
			<p>&copy;版权所有</p>
		</div>
	</div>
	<script src="../plugin/jquery.js"></script>
	<script>
		$(document).ready(function(){


			$('.viewer-box-out-style-1 li').on('click',function(){

				$(this).closest('ul').find('.active').removeClass('active');
				var buttonToShow = $(this).attr('rel');
				$(this).addClass('active');

				$('.viewer-box-inner .active').removeClass('active').hide();
				$('#'+buttonToShow).addClass('active').show();
			});

			$('.viewer-box-out-style-1 img').on('click',function(){
				$('.viewer-box-out-style-1').hide();
				$('.viewer-box-out-style-2').show();
			});

			$('.viewer-box-out-style-2 img').on('click',function(){
				$('.viewer-box-out-style-2').hide();
				$('.viewer-box-out-style-1').show();
			});
		});
	</script>
</body>
</html>