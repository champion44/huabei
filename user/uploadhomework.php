<?php


    header('Content-Type: application/json');
    header('Content-Type: text/html;charset=utf-8');

    $experimentname = $_POST['experimentname'];
    $studentname = $_POST['studentname'];
	$First_Answer = $_POST['First_Answer'];
	$Second_Answer = $_POST['Second_Answer'];
	$Third_Answer = $_POST['Third_Answer'];

	include '../database/config.php';

	$isStudentExist = "SELECT * FROM homework WHERE experimentname='{$experimentname}'";

	$rst_lookup = $mysqli->query($isStudentExist);

	if (null == ($row = mysqli_fetch_assoc($rst_lookup))) 
	{
        $insert = "INSERT INTO homework (`studentname`,`experimentname`,`First_Answer`,`Second_Answer`,`Third_Answer`) VALUES ('{$studentname}', '{$experimentname}', '{$First_Answer}', '{$Second_Answer}', '{$Third_Answer}')";

        $rst_insert = $mysqli->query($insert);

        if ( null == ($row = mysqli_fetch_assoc($rst_insert))) {
        	alert("Submit Fails");
        }

    }	else {
    		$update = "UPDATE `homework` set First_Answer='{$First_Answer}' , Second_Answer='{$Second_Answer}' , Third_Answer='{$Third_Answer}' where experimentname='{$experimentname}'";

    		$rst_update = $mysqli->query($update);
    		
    		if ( null == ($row = mysqli_fetch_assoc($rst_insert))) {
        	alert("Submit Fails");
        }
    }

  ?>