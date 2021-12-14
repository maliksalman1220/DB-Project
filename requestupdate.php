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
	$Category = $_GET['Category'];

	$query = "SELECT `UserID` FROM `users` WHERE `users`.`email` = '$useremail'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);

	$query1 = "SELECT * FROM categories WHERE `Categories` = '$Category'";
	$result1 = mysqli_query($conn, $query1);
	$row1 = mysqli_fetch_assoc($result1);

	$query2 = "INSERT INTO `requests` (`UserID`, `Title`, `Description`, `minPrice`, `maxPrice`, `RequiredDeliveryDays`, `CatID`) VALUES ('$row[UserID]', '$Title', '$Description', '$minPrice', '$maxPrice', '$RequiredDeliveryDays', '$row1[CatID]')";

	if (mysqli_query($conn, $query2))
	{
		header("Location:requests.php?email=$useremail");
	} 
	else
	{
		header("Location:requests.php?email=$useremail");
	}

	mysqli_close($conn);
?>