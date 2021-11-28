<?php
		include('conn_database.php');
		$useremail = $_GET['email'];

		$query = "SELECT * FROM `users` WHERE `email` = '$useremail'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$AccountType = $row['AccountType'];
		echo "<a href=profile.php?email=$useremail> <button>Back</button> </a><br><br>";	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Link Up</title>
</head>
<body>
	<h4>Update Your Profile</h4>
	<form action="update.php" method="get">
		<?php echo "<h3>$row[Name]</h3>"; ?>
		<h5>Contact Info.</h5>
		<input type="text" name="ContactInfo", placeholder="Enter Your Contact">
		<br>
		<h5>Country</h5>
		<input type="text" name="Country", placeholder="Enter Your Country">
		<br><br>
		<input type="hidden" name="email", value=<?php echo $useremail; ?>>
		<input type="hidden" name="AccountType", value=<?php echo $AccountType; ?>>
		<input type="submit" value="Update">
	</form>
	<br>
</body>
</html>