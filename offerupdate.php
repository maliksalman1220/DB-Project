<?php 
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}

	include('conn_database.php');

	$useremail = $_GET['email'];
	$B_userid = $_GET['MyID'];
	$GigID = $_GET['GigID'];
	$Description = $_GET['Description'];
	$Price = $_GET['Price'];
	$RequiredDeliveryDays = $_GET['RequiredDeliveryDays'];


	$query = "INSERT INTO `gigoffer` (`GigID`, `B_userid`, `Description`, `Price`,`RequiredDeliveryDays`) VALUES ('$GigID', '$B_userid', '$Description', '$Price', '$RequiredDeliveryDays')";

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