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
</head>
<body>
	<?php 
	echo "<a href=dashboard.php?email=$useremail>	<button>Back</button> </a>";
	echo "<br><br>";
	echo "<a href=profile.php?email=$useremail>	<button>Profile</button> </a>";
	echo "<br><br><h1>Post Your Requests</h1>";
	?>


	<form action="requestupdate.php" method="get">
		<h5>Title</h5>
		<input type="text" name="Title", placeholder="Enter Title Here!">
		<br>
		<h5>Description</h5>
		<input type="text" name="Description", placeholder="Enter Description">
		<br>
		<h5>Minimum Price</h5>
		<input type="int" name="minPrice", placeholder="Enter Minimum Price">
		<br>
		<h5>Maximum Price</h5>
		<input type="int" name="maxPrice", placeholder="Enter Maximum Price">
		<br>
		<h5>Required Delivey Days</h5>
		<input type="int" name="RequiredDeliveryDays", placeholder="Enter Required Delivery Days">
		<br>
		<input type="hidden" name="email", value=<?php echo $useremail; ?>>
		<br>
		<input type="submit" value="Post">
	</form>
</body>
</html>