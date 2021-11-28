<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'linkup_db';

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if ($conn == false)
	{
		echo "Connection Failed";
	}
?>