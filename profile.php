<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'linkup_db';

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if ($conn == false)
	{
		echo "Connection Failed";
	}

	$useremail = $_GET['email'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Link Up</title>
</head>
<body>
	<div>
<!-- 		<img src="pp.jpg" width="200" height="200"> -->
		<br>
		<?php
		$query = "SELECT `Name` FROM `freelancers` WHERE `email` = '$useremail'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		
		?>
		<h1>
			<?php
			echo $row['Name'];
			?>
		</h1>
	</div>
	<p>Email</p>
	<?php 
		$query = "SELECT `email` FROM `freelancers` WHERE `email` = '$useremail'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		echo $row['email'];
	?>
	<br>
	<p>Contact Info.</p>
	<?php 
		$query = "SELECT `ContactInfo` FROM `freelancers` WHERE `email` = '$useremail'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		echo $row['ContactInfo'];
	?>
	<br>
	<p>Date of Birth</p>
	<?php 
		$query = "SELECT `DateOfBirth` FROM `freelancers` WHERE `email` = '$useremail'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		echo $row['DateOfBirth'];
	?>
	<br>
	<p>Rating</p>
	<?php 
		$query = "SELECT `Rating` FROM `freelancers` WHERE `email` = '$useremail'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		echo $row['Rating'];
	?>
	<br>
	<p>Country</p>
	<?php 
		$query = "SELECT `Country` FROM `freelancers` WHERE `email` = '$useremail'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		echo $row['Country'];
		echo "<br>
		<a href=profileupdate.php?email=$useremail>
			<button>update profile</button>
		</a>";	
	?>
</body>
</html>