<?php
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}

	include('conn_database.php');

	$useremail = $_GET['email'];
	$query = "SELECT * FROM `users` WHERE `email` = '$useremail'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$AccountType = $row['AccountType'];
	$MyID = $row['UserID'];

	if (empty($_GET['catID']))
	{
		$catID = 1;
	}
	else
	{
		$catID = $_GET['catID'];
	}

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

<div class="text-center mt-0 pt-0 mx-3">	
	<h1 class="h1-responsive font-weight-bold text-center my-4 jumbotron">DashBoard</h1>
	<a href=logout.php class="btn btn-primary">Log out</a>
	<?php 
	
	echo "<a class='btn btn-primary m-1' href=profile.php?email=$useremail&AccountType=$AccountType>Profile</a>";
	
	echo "<a class='btn btn-primary m-1' href=message.php?email=$useremail>Messages</a>";

	echo "<a class='btn btn-primary m-1' href=transaction.php?email=$useremail>Send Money</a>";

	echo "<a class='btn btn-primary m-1' href=gigorders.php?email=$useremail&UserID=$MyID&AccountType=$AccountType>Gig Orders</a>";

	echo "<a class='btn btn-primary m-1' href=requestorders.php?email=$useremail&UserID=$MyID&AccountType=$AccountType>Request Orders</a>";
	

	if ($AccountType == "freelancer")
	{
		echo "<a class='btn btn-primary m-1' href=mygigs.php?email=$useremail>My Gigs</a>";

		echo "<a class='btn btn-primary m-1' href=gigpost.php?email=$useremail>Post Gig</a>";
	}
	else
	{
		echo "<a class='btn btn-primary m-1' href=myrequests.php?email=$useremail>My Requests</a>";
		
		echo "<a class='btn btn-primary mx-1' href=requestpost.php?email=$useremail>Post Requests</a>";
	}

	echo "<a class='btn btn-primary m-1' href=dashboard.php?email=$useremail&AccountType=$AccountType>Gigs</a>";
	echo "<a class='btn btn-primary m-1' href=requests.php?email=$useremail&AccountType=$AccountType>Requests</a>";
    echo "<hr>";

	// echo "<br><br>";
	$query1 = "SELECT * FROM `categories`";
	$result1 = mysqli_query($conn, $query1);
	while ($row1 = mysqli_fetch_assoc($result1))
	{
		echo "<a href=dashboard.php?email=$useremail&catID=$row1[CatID]>$row1[Categories] </a>";
	}


	if ($catID == 1)
	{
		$query = "SELECT * FROM `users` JOIN `gigs` ON `users`.`UserID` = `gigs`.`UserID`";
		$result = mysqli_query($conn, $query);
	}
	else
	{ 	
		$query = "SELECT * FROM `users` JOIN `gigs` ON `users`.`UserID` = `gigs`.`UserID` WHERE `gigs`.`CatID` = '$catID'";
		$result = mysqli_query($conn, $query);
	}

	while ($row = mysqli_fetch_assoc($result))
	{
		$query1 = "SELECT * FROM `gigs` JOIN `gigorders` ON `gigs`.`GigID` = `gigorders`.`Gig` WHERE `gigs`.`GigID` = '$row[GigID]'";
		$result1 = mysqli_query($conn, $query1);
		$row1 = mysqli_fetch_assoc($result1);

		echo "
		<div class='card text-center my-5'>
			<div class='card-header'>Posted By: <small class='small'>$row[Name]</small></div>";

		if ($row1['Status'] == "")
		{
			echo "<div><h6> Status: Un Ordered <h6></div>";
			echo "<div class='card-body'>
			<h5 class='card-title'><a href=offers.php?email=$useremail&GigID=$row[GigID]>$row[Title]</a></h5>
			</div>";
		}
		else
		{
			echo "<div><h6> Status: Ordered <h6></div>";
			echo "<div class='card-body'>
			<h5 class='card-title'>$row[Title]</h5>
			</div>";
		}

		echo "
		<div class='card-body'>
			<p class='card-text'>$row[Description]</p>
			<button class='btn'>Min Price: $row[minPrice]</button>
			<button class='btn'>Max Price: $row[maxPrice]</button>
			</div>

			<div class='card-footer text-muted'>
			       Expected Delivery Days: $row[ExpectedDeliveryDays]
			</div>
		</div>";

		if ($AccountType == "business")
		{
			echo "
			<br>
			<a class='btn btn-primary mt-3' href=postoffer.php?email=$useremail&MyID=$MyID&UserID=$row[UserID]&GigID=$row[GigID]>Offer<a>
			<br>";
		}
	}
	?>


</div>

<!-- Boostrap CDN -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>