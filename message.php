<?php 
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}

	include('conn_database.php');

	$useremail = $_GET['email'];

	$query = "SELECT * FROM `users` WHERE `users`.`email` != '$useremail'";
	$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Users List</title>
</head>
<body>
	<?php echo "<a href=dashBoard.php?email=$useremail> <button>Back</button> </a>"; ?>
	<h2>Users List</h2>
	<br><br>
	<?php 
		while ($row = mysqli_fetch_assoc($result))
		{
			$to_user_id = $row['email'];
			echo "$row[Name]  ";
			echo "<a href=chat.php?email=$useremail&to_user_id=$to_user_id> <button>Send Text</button> </a>";
			echo "<br>";
		}
	?>
</body>
</html>