<?php 

session_start();

header('content-type:text/html;charset=utf-8');

include '../database/config.php';

$expeimentname = $_SESSION['experimentname'];

$pdfurl = $_POST['PDF'];
$flashurl = $_POST['FLASH'];
$videourl = $_POST['VIDEO'];

$pdffile = $_FILES['PDF'];
$flashfile = $_FILES['FLASH'];
$videofile = $_FILES['VIDEO'];

echo $experimentname;
exit();

$sql = "UPDATE `experimentlist` set pdfurl='{$pdfurl}' , flashurl='{flashurl}' , videourl='{$videourl}' where experimentname='{$expeimentname}' ";

$rst = $mysqli->query($sql);

echo $rst;

 ?>