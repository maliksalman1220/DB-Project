<?php

$useremail = $_GET['email'];
$ContactInfo = $_GET['ContactInfo'];
$Country = $_GET['Country'];

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
	$query1 = "UPDATE `freelancers` SET `ContactInfo` = '$ContactInfo' WHERE `freelancers`.`email` = '$useremail'"; 
	$query2 = "UPDATE `freelancers` SET `Country` = '$Country' WHERE `freelancers`.`email` = '$useremail'";
	 
	if (mysqli_query($conn, $query1) && mysqli_query($conn, $query2))
	{
		header("Location:profile.php?email=$useremail");
		//Put a Notification if query insertion is successful or not
	} 
	else
	{
		header("Location:profile.php");
	}
}
?>