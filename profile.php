<?php
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}

	include('conn_database.php');

	$useremail = $_GET['email'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Link Up</title>
</head>
<body>
		<?php
			echo "<a href=dashboard.php?email=$useremail> <button>Back</button> </a>";
			$query = "SELECT * FROM `users` WHERE `email` = '$useremail'";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);

			echo "<div>
			<h3>Name:</h3>
			$row[Name]
			<h5>Email:</h5>
			$row[email]
			<h5>Gender:</h5>
			$row[Gender]
			<h5>Date of Birth:</h5>
			$row[DateOfBirth]
			<h5>Contact Info.:</h5>
			$row[ContactInfo]
			<h5>Country:</h5>
			$row[Country]
			</div> <br><br>";

			echo "<a href=profileupdate.php?email=$useremail> <button>Update Profile</button> </a>";
		?>
</body>
</html>