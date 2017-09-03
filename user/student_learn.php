<?php 

header('content-type:text/html;charset=utf-8');

session_start();

include '../database/config.php';


if (!$_SESSION['id']) {
		echo "<script>location='../login.php'</script>";
}


$experimentname = $_POST['experiment_name'];
$studentname = $_POST['student_name'];


$sql = "SELECT * FROM experimentlist WHERE experimentname='{$experimentname}' ";

$rst = $mysqli->query($sql);

if ($rst) {
	$row = mysqli_fetch_assoc($rst);

	$pdfurl = "../files/".$row['pdfurl'];

	$flashurl = "../files/".$row['flashurl'];

	$videourl = "../files/".$row['videourl'];


}


 ?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>华北电力大学动力工程系实验管理系统</title>
	<link rel="stylesheet" href="../css/reset.css" />
	<link rel="stylesheet" href="../css/student-learn.css" />
</head>
<body>


	<div class="main">
		<div class="banner">
			<div><img src="../imges/logo.png" alt="" /></div>
			<div><span>动力工程系</span></div>
		</div>
		<!--div class="body">
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
				<p><?php echo $experimentname; ?></p>
				<div class="viewer-box-out-style-1">
					<div><img src="../imges/stylechange.png" alt="NCEPU" rel="1"/></div>
					<ul>
						<li rel="slides" class="active">Slides</li>
						<li rel="video">Video</li>
						<li rel="flash">Flash</li>
					</ul>
						<div class="floatClear"></div>
						<div class="viewer-box-inner">
							<!--embed id="slides" class="box active" src=<?php /*echo $pdfurl;?> type="application/pdf" />
							<video id="video" class="box" src=<?php echo $videourl;?>></video>
							<embed id="flash" class="box" src=<?php echo*/ $flashurl;?> type="application/x-shockwave-flash" /-->
							<embed id="slides" class="box active" src=<?php echo $pdfurl;?> type="application/pdf" />
								<video id="video" width="100%" height="100%" controls>
									  <source src=<?php echo $videourl; ?> type="video/mp4">
									  <object data="movie.mp4" width="100%" height="100%">
									    <embed width="320" height="240" src=<?php echo $videourl; ?>>
									  </object>
									</video>
							<!--video id="video" class="box" src=<?php /*echo*/ $videourl;?>></video-->
							<!--embed id="flash" class="box" src=<?php /*echo*/ $flashurl;?> type="application/x-shockwave-flash" /-->
							<object id="flash" style="border:0px" width="100%" height="100%" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="780" height="160">
								<param name="movie" value=<?php echo $flashurl;?> />
								<param name="quality" value="high" />
								<embed src=<?php echo $flashurl;?> quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="100%" height="100%"></embed>
							</object>
						</div>
				</div>
				<div class="viewer-box-out-style-2">
					<div><img src="../imges/stylechange.png" alt="NCEPU" /></div>
					<div class="viewer-flash-2">
						<div class="flash">Flash</div>
						<embed  class="viewer-flash" src=<?php echo $flashurl;?> type="application/x-shockwave-flash" />
					</div>
					<div class="viewer-video-2">
						<div class="video">Video</div>
						<video class="viewer-video" src=<?php echo $videourl;?>></video>
					</div>
					<div class="floatClear"></div>
					<div class="viewer-sildes-2">
						<div class="slides">Slides</div>
						<embed class="viewer-sildes" src=<?php echo $pdfurl;?> type="application/pdf" />
					</div>
				</div>
				<div class="floatClear"></div>
			</div>
			<div class="distanceEffect"></div>
		</div-->
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

