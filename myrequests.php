<?php
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}

	include('conn_database.php');

	$useremail = $_GET['email'];
	// $query = "SELECT * FROM `users` WHERE `email` = '$useremail'";
	// $result = mysqli_query($conn, $query);
	// $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
	<title>LinkUp</title>
</head>
<body>
	<?php echo "<a href=dashBoard.php?email=$useremail> <button>Back</button> </a>"; ?>
	<h1>My Requests</h1>
	<?php 
	echo "<a href=profile.php?email=$useremail> <button>Profile</button> </a>";
	echo "<br><br>";

	$query = "SELECT * FROM `users` JOIN `requests` ON `users`.`UserID` = `requests`.`UserID` WHERE `users`.`email` = '$useremail'";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($result))
	{
		echo "<div>
		<h3>Posted By:</h3>
		$row[Name]
		<br>
		<h3>Title:</h3>
		$row[Title]
		<br>
		<h3>Description:</h3>
		$row[Description]
		<br>
		<h3>Min Price:</h3>
		$row[minPrice]
		<br>
		<h3>Max Price:</h3>
		$row[maxPrice]
		<br>
		<h3>Required Delivery Days:</h3>
		$row[RequiredDeliveryDays]
		<br>
		</div>
		";
	}

	?>
</body>
</html>