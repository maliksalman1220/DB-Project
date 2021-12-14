<?php
		include('conn_database.php');
		$useremail = $_GET['email'];

		$query = "SELECT * FROM `users` WHERE `email` = '$useremail'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$AccountType = $row['AccountType'];
		echo "<a href=profile.php?email=$useremail> <button>Back</button> </a><br><br>";	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Link Up</title>
</head>
<body>
	<h3>Bank Details</h3>
		<?php 
		$query1 = "SELECT * FROM `bank account` WHERE `UserID` = '$row[UserID]'";
		$result1 = mysqli_query($conn, $query1);
		$row1 = mysqli_fetch_assoc($result1);
		if ($row1['UserID'] != NULL)
		{

			echo "<div>
			<h5>Bank Name:</h5>
			$row1[BankName]	
			<h5>Account Number:</h5>
			$row1[AccountNumber]
			<h5>IBAN:</h5>
			$row1[IBAN]
			<h5>Balance:</h5>
			$row1[Balance]
			<br><br>
			</div>
			";
		} 
		else
		{
			echo "No details";
		}
		echo "<br><br>";
		echo "<a href=updatedetails.php?email=$useremail> <button>Update</button> </a><br><br>";
		?>
</body>
</html>