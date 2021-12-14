<?php
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}

	include('conn_database.php');
	$useremail = $_GET['email'];
	$MyID = $_GET['MyID'];
	$UserID = $_GET['UserID'];
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
	echo "<a href=dashboard.php?email=$useremail>	<button>Back</button> </a>";
	echo "<br><br>";
	echo "<h1>Post Your Offer</h1>";
	?>


	<form action="offerupdate.php" method="get">
		<h5>Description</h5>
		<input type="text" name="Description", placeholder="Enter Description">
		<br>
		<h5>Price</h5>
		<input type="int" name="Price", placeholder="Enter Price">
		<br>
		<h5>Required Delivery Days</h5>
		<input type="int" name="RequiredDeliveryDays", placeholder="Enter Required Delivery Days">
		<br>
		<input type="hidden" name="email", value=<?php echo $useremail; ?>>
		<br>
		<input type="hidden" name="MyID", value=<?php echo $MyID; ?>>
		<br>
		<input type="hidden" name="UserID", value=<?php echo $UserID; ?>>
		<br>
		<input type="hidden" name="GigID", value=<?php echo $GigID; ?>>
		<br>
		<input type="submit" value="Post">
	</form>


<!-- Boostrap CDN -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>