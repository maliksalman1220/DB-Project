<?php 
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}

	include('conn_database.php');

	$useremail = $_GET['email'];
	$to_user_email = $_GET['to_user_id'];


	$query = "SELECT * FROM `users` JOIN `chat_message` ON `users`.`email` = `chat_message`.`from_user_id` WHERE (`from_user_id` = '$useremail' AND `to_user_id` = '$to_user_email') || (`from_user_id` = '$to_user_email' AND `to_user_id` = '$useremail') ORDER BY `timestamp` ASC";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($result))
	{
		echo "$row[Name]: $row[chat_message]<br>";
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Chatbox</title>
</head>
<body>
<div>
	<form action="insert_chat.php" method="get">
		<input type="text" name="message" placeholder="Write Message here">
		<input type="hidden" name="from_user_id", value=<?php echo $useremail; ?>>
		<input type="hidden" name="to_user_id", value=<?php echo $to_user_email; ?>>
		<input type="submit" value="send">
	</form>
</div>
</body>
</html>