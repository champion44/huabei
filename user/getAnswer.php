<?php 

    header('Content-Type: application/json');
    header('Content-Type: text/html;charset=utf-8');


    $experimentname = $_GET['experimentname'];

    $answer = [];


    include '../database/config.php';


    $query_answer = "SELECT * FROM homework WHERE experimentname='{$experimentname}'";


	$rst_answer= $mysqli->query($query_answer);

	if ( null == ($row = mysqli_fetch_assoc($rst_answer))) {
		echo $_GET['callback']."(0)";
	}
	else 
	{
		$answer['First_Answer'] = $row['First_Answer'];
        $answer['Second_Answer'] = $row['Second_Answer'];
        $answer['Third_Answer'] = $row['Third_Answer'];


       echo $_GET['callback']."(".json_encode($answer).")";
	}


 ?>