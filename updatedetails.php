<?php
	include('conn_database.php');
	$useremail = $_GET['email'];

	$query = "SELECT * FROM `users` WHERE `email` = '$useremail'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	echo "<a href=profile.php?email=$useremail> <button>Back</button> </a><br><br>";

	$query1 = "SELECT UserID FROM `bank account` WHERE `bank account`.`UserID` = '$row[UserID]'";
	$result1 = mysqli_query($conn, $query1);
	$row1 = mysqli_fetch_assoc($result1);

	if ($row1['UserID'])
	{
		echo "Bank Accounted Already Existed";
		header("Location:profile.php?email=$useremail");
	}		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Link Up</title>
</head>
<body>
	<h4>Update Your Bank Account</h4>
	<form action="updatebank.php" method="get">
		<h5>Bank Name</h5>
		<input type="text" name="BankName", placeholder="Enter Your Bank Name">
		<br>
		<h5>Account Number</h5>
		<input type="text" name="AccountNumber", placeholder="Enter Your Account Number">
		<h5>IBAN</h5>
		<input type="text" name="IBAN", placeholder="Enter IBAN">
		<br>
		<h5>Balance</h5>
		<input type="int" name="Balance", placeholder="Enter Your Current Balance">
		<br><br>
		<input type="hidden" name="email", value=<?php echo $useremail; ?>>
		<input type="hidden" name="UserID", value=<?php echo $row['UserID']; ?>>
		<input type="submit" value="Update">
	</form>
	<br>
</body>
</html>