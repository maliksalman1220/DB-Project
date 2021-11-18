<?php

$userID = $_GET['email'];
$userpassword = $_GET['Password'];

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'linkup_db';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn == false)
{
	echo "Connection Failed";
}
else
{
	$query = "SELECT `email` FROM `freelancers` WHERE `email` = '$userID' AND `Password` = '$userpassword'";

	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) == 0)
	{
		header('Location:login.php');
		//Notification: Either email or password is incorrect.
	}
	else
	{
		session_start();
		$_SESSION['login'] = 1;
		header("Location:dashboard.php?email=$userID");
	}

	mysqli_close($conn);
}
?>