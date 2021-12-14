<?php
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}

	include('conn_database.php');

	$useremail = $_GET['email'];
	$B_userID = $_GET['B_userID'];
	$F_userID = $_GET['F_userID'];
	$GigID = $_GET['GigID'];

	$query = "INSERT INTO `gigorders` (`Gig`, `B_userid`, `F_userid`, `Status`) VALUES ('$GigID', '$B_userID', '$F_userID', 'In-Progress')";
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