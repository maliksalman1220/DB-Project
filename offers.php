<?php
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}

	include('conn_database.php');

	$useremail = $_GET['email'];
	$query = "SELECT * FROM users WHERE `email` = '$useremail'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$GigID = $_GET['GigID'];


?>

<!DOCTYPE html>
<html>
<head>
	<title>LinkUp</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Boostrap CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Custom css file -->
	<link rel="stylesheet" href="style.css">
	
</head>
<body>
	<?php 
	echo "<h1>Gig</h1>";
	$query1 = "SELECT * FROM `gigs`WHERE `gigs`.`GigID` = '$GigID'";
	$result1 = mysqli_query($conn, $query1);
	$row1 = mysqli_fetch_assoc($result1);
	$F_userID = $row1['UserID'];
	echo "<div>
	<h3>Title:</h3>
	$row1[Title]
	<br>
	<h3>Description:</h3>
	$row1[Description]
	<br>
	<h3>Min Price:</h3>
	$row1[minPrice]
	<br>
	<h3>Max Price:</h3>
	$row1[maxPrice]
	<br>
	<h3>Expected Delivery Days:</h3>
	$row1[ExpectedDeliveryDays]
	<br>
	</div>
	";

	echo "<h1>Offers</h1>";
	$query2 = "SELECT * FROM `users` JOIN `gigoffer` ON `users`.`UserID` = `gigoffer`.`B_userid` WHERE `gigoffer`.`GigID` = '$GigID'";
	$result2 = mysqli_query($conn, $query2);
	while ($row2 = mysqli_fetch_assoc($result2))
	{
		echo "<div>
		<h3>Posted By:</h3>
		$row2[Name]
		<br>
		<h3>Description:</h3>
		$row2[Description]
		<br>
		<h3>Price:</h3>
		$row2[Price]
		<br>
		<h3>Required Delivery Days:</h3>
		$row2[RequiredDeliveryDays]
		<br><br>
		</div>	";
		if ($row1['UserID'] == $row['UserID'])
		{
			echo "<a href=ordergenerate.php?email=$useremail&GigID=$GigID&B_userID=$row2[UserID]&F_userID=$F_userID><button>Accept Offer</button></a>";
		}
	}
	?>


<!-- Boostrap CDN -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>