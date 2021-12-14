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
	<h4>Add Skills</h4>
	<form action="updateskill.php" method="get">
		<input type="text" name="skills", placeholder="Enter Your Skills">
		<br><br>
		<input type="hidden" name="email", value=<?php echo $useremail; ?>>
		<input type="hidden" name="UserID", value=<?php echo $row['UserID']; ?>>
		<input type="submit" value="Update">
	</form>	
	<br>
</body>
</html>