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
	header('Location:index.php?PasswordFailure=1');
}
else
{
	include('conn_database.php');

	$query = "INSERT INTO `users` (`Name`, `Password`, `email`, `AccountType`, `Gender`, `DateOfBirth`) VALUES ('$Name', '$Password1' ,'$email', '$AccountType', '$Gender' ,'$DateOfBirth')";


	if (mysqli_query($conn, $query))
	{
		header("Location:login.php?message=Signed Up Successfully");
	} 
	else 
	{
		header("Location:main.php?message=ERROR: Signed Up failed");
	}

	mysqli_close($conn);
}
?>