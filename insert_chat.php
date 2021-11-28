<?php 
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}

	include('conn_database.php');

	$useremail = $_GET['from_user_id'];
	$to_user_email = $_GET['to_user_id'];
	$message = $_GET['message'];

	$query = "INSERT INTO `chat_message` (`to_user_id`, `from_user_id`, `chat_message`, `timestamp`) VALUES ('$to_user_email', '$useremail', '$message', CURRENT_TIMESTAMP);";

	if (mysqli_query($conn, $query))
	{
		header("Location:chat.php?email=$useremail&to_user_id=$to_user_email");
	} 
	else
	{
		header("Location:chat.php?email=$useremail&to_user_id=$to_user_email");
	}




?>