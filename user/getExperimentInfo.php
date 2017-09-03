<?php  

    header('Content-Type: application/json');
    header('Content-Type: text/html;charset=utf-8');


    $experimentname = $_GET['experimentname'];

    $experiment = [];

    include '../database/config.php';


    $sql_student = "SELECT * FROM experimentlist WHERE experimentname='{$experimentname}'";


	$rst_student = $mysqli->query($sql_student);

	if (null == ($row = mysqli_fetch_assoc($rst_student))) 
	{
        echo $_GET['callback']."(no such experiment)";
    } 
    else 
    {
        $experiment['experimentname'] = $experimentname;
        $experiment['pdfurl'] = $row['pdfurl'];
        $experiment['videourl'] = $row['videourl'];
        $experiment['flashurl'] = $row['flashurl'];
        $experiment['First_Question'] = $row['First_Question'];
        $experiment['Second_Question'] = $row['Second_Question'];
        $experiment['Third_Question'] = $row['Third_Question'];


        echo $_GET['callback']."(".json_encode($experiment).")";
	};    
?>