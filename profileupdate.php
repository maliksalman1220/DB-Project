<!DOCTYPE html>
<html>
<head>
	<title>Link Up</title>
</head>
<body>
	<div>
		<br>
		<?php
			$useremail = $_GET['email'];
			$servername = 'localhost';
			$username = 'root';
			$password = '';
			$dbname = 'linkup_db';

			$conn = mysqli_connect($servername, $username, $password, $dbname);

			if ($conn == false)
			{
				echo "Connection Failed";
			}
			$query = "SELECT `Name` FROM `freelancers` WHERE `freelancers`.`email` = '$useremail'";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);
			echo $row['Name'];
			?>
	</div>
	<?php 

	?>
	echo <form action="update.php" method="get">
		<p>Contact Info.</p>
		<input type="text" name="ContactInfo", placeholder="Enter Your Contact">
		<br>
		<p>Country</p>
		<input type="text" name="Country", placeholder="Enter Your Country">
		<br>
		<input type="hidden" name="email", value=<?php echo $useremail; ?>>
		<input type="submit" value="Update">
	</form>
	<br>
</body>
</html>