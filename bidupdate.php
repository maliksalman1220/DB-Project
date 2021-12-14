<?php 
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}

	include('conn_database.php');

	$useremail = $_GET['email'];
	$F_userid = $_GET['MyID'];
	$RequestID = $_GET['RequestID'];
	$Description = $_GET['Description'];
	$Price = $_GET['Price'];
	$ExpectedDeliveryDays = $_GET['ExpectedDeliveryDays'];

	$query = "INSERT INTO `requestbid` (`RequestID`, `F_userid`, `Description`, `Price`,`ExpectedDeliveryDays`) VALUES ('$RequestID', '$F_userid', '$Description', '$Price', '$ExpectedDeliveryDays')";

	if (mysqli_query($conn, $query))
	{
		header("Location:dashboard.php?email=$useremail");
	} 
	else
	{
		header("Location:dashboard.php?email=$useremail");
	}

	mysqli_close($conn);
?>