<?php

$Name = $_GET['Name'];
$Password1 = $_GET['Password1'];
$Password2 = $_GET['Password2'];
$Gender = $_GET['Gender'];
$DateOfBirth = $_GET['DateOfBirth'];
$AccountType = $_GET['AccountType'];
$email = $_GET['email'];

if ($Password1 != $Password2)
{
	// header('Location:index.php?PasswordFailure=1');
	echo "Password does not match";
}
else
{
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'linkup_db';

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if ($conn == false)
	{
		echo "Connection Failed";
	}

	if ($AccountType == "business")
	{
		$query = "INSERT INTO `businesses` (`Name`, `Password`, `Gender`, `DateOfBirth`, `email`) VALUES ('$Name', '$Password1', '$Gender', '$DateOfBirth', '$email')";
	}
	else
	{
		$query = "INSERT INTO `freelancers` (`Name`, `Password`, `Gender`, `DateOfBirth`, `email`) VALUES ('$Name', '$Password1', '$Gender', '$DateOfBirth', '$email')";
	}

	if (mysqli_query($conn, $query))
	{
		echo "Query Inserted Successfully";
	} 
	else
	{
		echo "Query Insertion Failed";
	}

	mysqli_close($conn);
}
?>