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
		echo "<div>
			<h3>Title</h3>$row[Title]
			<br>
			<h3>Description</h3>
			$row[Description]
			<br>
			<h3>Minimum Price</h3>
			$row[minPrice]
			<br>
			<h3>Maximum Price</h3>
			$row[maxPrice]
			<br>
			<h3>Expected Delvery Date</h3>
			$row[expectedDeliveryTime]
			<br>
		</div>";
	}
?>