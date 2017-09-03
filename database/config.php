<?php
	
$mysqli = new mysqli('localhost', 'cham', '123', 'studentdb');

$mysqli->query("set names 'utf8'");

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
};

?>