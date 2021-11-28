<?php 
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}

	include('conn_database.php');

	$useremail = $_GET['email'];
	$Title = $_GET['Title'];
	$Description = $_GET['Description'];
	$minPrice = $_GET['minPrice'];
	$maxPrice = $_GET['maxPrice'];
	$RequiredDeliveryDays = $_GET['RequiredDeliveryDays'];

	$query = "SELECT `UserID` FROM `users` WHERE `users`.`email` = '$useremail'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);

	$query1 = "INSERT INTO `requests` (`UserID`, `Title`, `Description`, `minPrice`, `maxPrice`, `RequiredDeliveryDays`) VALUES ('$row[UserID]', '$Title', '$Description', '$minPrice', '$maxPrice', '$RequiredDeliveryDays')";

	if (mysqli_query($conn, $query1))
	{
		header("Location:requests.php?email=$useremail");
	} 
	else
	{
		header("Location:requests.php?email=$useremail");
	}

	mysqli_close($conn);
?>