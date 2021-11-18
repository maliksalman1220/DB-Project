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

	$query = "SELECT * FROM `Gigs`";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($result))
	{
		echo $row['Title'];
		echo "<br>";
		echo $row['Description'];
		echo "<br>";
		echo $row['minPrice'];
		echo "<br>";
		echo $row['maxPrice'];
		echo "<br>";
		echo $row['expectedDeliveryTime'];
		echo "<br>";
	}
?>