<?php

	$useremail = $_GET['email'];
	$ContactInfo = $_GET['ContactInfo'];
	$Country = $_GET['Country'];
	$AccountType = $_GET['AccountType'];

	include('conn_database.php');

	$query1 = "UPDATE `users` SET `ContactInfo` = '$ContactInfo' WHERE `users`.`email` = '$useremail'";
	$query2 = "UPDATE `users` SET `Country` = '$Country' WHERE `users`.`email` = '$useremail'"; 
	 
	if (mysqli_query($conn, $query1) && mysqli_query($conn, $query2))
	{
		header("Location:profile.php?email=$useremail");
		//Put a Notification if query insertion is successful or not
	} 
	else
	{
		header("Location:profile.php?email=$useremail");
	}
?>