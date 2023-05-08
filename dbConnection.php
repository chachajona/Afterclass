<?php

	$dbServername = 'localhost';
	$username ='root';
	$password ='';
	$dbName = 'after_class';

	//Establish database connection
	$con= new mysqli(
		$dbServername,
		$username,
		$password,
		$dbName)
	or 
	die("Failed to establish database".mysqli_error($con));
	
?>