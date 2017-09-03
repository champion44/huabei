<?php 

    header('Content-Type: application/json');
    header('Content-Type: text/html;charset=utf-8');


    $id = $_GET['id'];

    $detail = [];

    include '../database/config.php';


    $sql_experiment = "SELECT experimentname FROM experimentlist ";


	$rst_experiment = $mysqli->query($sql_experiment);


	$detail = array();

	while ($row = mysqli_fetch_assoc($rst_experiment) )
	{
		$detail[] = $row;
	}

	$experimentCount = count($detail);

	$detail['experimentCount'] = $experimentCount;

	$sql_detail = "SELECT * FROM studentlist WHERE id='{$id}'";

	$rst_detail = $mysqli->query($sql_detail);



	while ($row = mysqli_fetch_assoc($rst_detail) ) {
		$detail[] = $row;
	}



	/*if (null == ($row = mysqli_fetch_assoc($rst_detail))) 
	{
        echo $_GET['callback']."(ERROR)";
    } 
    else 
    {
    	$detail['studentname'] = $row['studentname'];
    	$detail['studentid'] = $row['studentid'];
    	$detail['class'] = $row['class'];
    	$detail['contact'] = $row['contact'];
    	$detail['experimentCount'] = $experimentCount;
    	for ($i=0; $i < $experimentCount ; $i++) { 
    		$Ex_name = $experimentlist[$i];
    		$detail['$i'] = $row['$Ex_name'];
    	}
*/
     echo $_GET['callback']."(".json_encode($detail).")";


 ?>