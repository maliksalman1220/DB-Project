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
	echo "<h1>Post Your Bid</h1>";
	?>


	<form action="bidupdate.php" method="get">
		<h5>Description</h5>
		<input type="text" name="Description", placeholder="Enter Description">
		<br>
		<h5>Price</h5>
		<input type="int" name="Price", placeholder="Enter Price">
		<br>
		<h5>Expected Delivery Days</h5>
		<input type="int" name="ExpectedDeliveryDays", placeholder="Enter Expected Delivery Days">
		<br>
		<input type="hidden" name="email", value=<?php echo $useremail; ?>>
		<br>
		<input type="hidden" name="MyID", value=<?php echo $MyID; ?>>
		<br>
		<input type="hidden" name="UserID", value=<?php echo $UserID; ?>>
		<br>
		<input type="hidden" name="RequestID", value=<?php echo $RequestID; ?>>
		<br>
		<input type="submit" value="Post">
	</form>
</body>
</html>