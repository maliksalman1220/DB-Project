<?php

	$useremail = $_GET['email'];	
	$Skill = $_GET['skills'];
	$UserID = $_GET['UserID'];

	include('conn_database.php');

	$query = "INSERT INTO `skills` (`Skills`, `UserID`) VALUES ('$Skill', '$UserID')"; 
	 
	if (mysqli_query($conn, $query))
	{
		header("Location:profile.php?email=$useremail");
		//Put a Notification if query insertion is successful or not
	} 
	else
	{
		header("Location:profile.php?email=$useremail");
	}
?>