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
	$RequestID = $_GET['RequestID'];


?>

<!DOCTYPE html>
<html>
<head>
	<title>LinkUp</title>
</head>
<body>
	<?php 
	echo "<a href=requests.php?email=$useremail>	<button>Back</button> </a>";
	echo "<br><br>";
	echo "<h1>Request</h1>";
	$query1 = "SELECT * FROM `requests`WHERE `requests`.`RequestID` = '$RequestID'";
	$result1 = mysqli_query($conn, $query1);
	$row1 = mysqli_fetch_assoc($result1);
	$B_userID = $row1['UserID'];
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
	<h3>Required Delivery Days:</h3>
	$row1[RequiredDeliveryDays]
	<br>
	</div>
	";

	echo "<h1>Bids</h1>";
	$query2 = "SELECT * FROM `users` JOIN `requestbid` ON `users`.`UserID` = `requestbid`.`F_userid` WHERE `requestbid`.`RequestID` = '$RequestID'";
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
		<h3>Expected Delivery Days:</h3>
		$row2[ExpectedDeliveryDays]
		<br><br>
		</div>	";
		if ($row1['UserID'] == $row['UserID'])
		{
			echo "<a href=ordergenerate2.php?email=$useremail&RequestID=$RequestID&F_userID=$row2[UserID]&B_userID=$B_userID><button>Accept Bid</button></a>";
		}
	}
	?>
</body>
</html>