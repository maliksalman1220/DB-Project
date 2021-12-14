<?php
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}

	include('conn_database.php');

	$useremail = $_GET['email'];
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
	<?php echo "<a href=dashBoard.php?email=$useremail> <button>Back</button> </a>"; ?>
	<h1>My Gigs</h1>
	<?php 
	echo "<a href=profile.php?email=$useremail> <button>Profile</button> </a>";
	echo "<br><br>";

	$query = "SELECT * FROM `users` JOIN `gigs` ON `users`.`UserID` = `gigs`.`UserID` WHERE `users`.`email` = '$useremail'";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($result))
	{
		echo "<div>
		<h3>Posted By:</h3>
		$row[Name]
		<br>
		<h3>Title:</h3>
		$row[Title]
		<br>
		<h3>Description:</h3>
		$row[Description]
		<br>
		<h3>Min Price:</h3>
		$row[minPrice]
		<br>
		<h3>Max Price:</h3>
		$row[maxPrice]
		<br>
		<h3>Expected Delivery Days:</h3>
		$row[ExpectedDeliveryDays]
		<br>
		</div>
		";
	}

	?>


<!-- Boostrap CDN -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>