<?php

$useremail = $_GET['email'];
$userpassword = $_GET['Password'];

include('conn_database.php');


$query = "SELECT `email` FROM `users` WHERE `email` = '$useremail' AND `Password` = '$userpassword'";

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
	header("Location:dashboard.php?email=$useremail");
}

mysqli_close($conn);

?>