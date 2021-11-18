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

	$title = $_GET['Title'];
	$Description = $_GET['Description'];
	$minPrice = $_GET['minPrice'];
	$maxPrice = $_GET['maxPrice'];
	$expectedDeliveryDate = $_GET['expectedDeliveryDate'];

	$query = "INSERT INTO `gigs` (`Title`, `Description`, `minPrice`, `maxPrice`, `expectedDeliveryTime`) VALUES ('$title', '$Description', '$minPrice', '$maxPrice', '$expectedDeliveryDate')";

	if (mysqli_query($conn, $query))
	{
		echo "Query Inserted Successfully";
	} 
	else
	{
		echo "Query Insertion Failed";
	}

	mysqli_close($conn);
?>