<?php 
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}

	include('conn_database.php');

	$useremail = $_GET['from_user_id'];
	$to_user_email = $_GET['to_user_id'];
	$amount = $_GET['amount'];

	//Getting UserIDs from the user table.

	$query1 = "SELECT * FROM users WHERE `email` = '$useremail'";
	$result1 = mysqli_query($conn, $query1);
	$row1 = mysqli_fetch_assoc($result1);
	$from_user_id = $row1['UserID'];

	$query2 = "SELECT * FROM users WHERE `email` = '$to_user_email'";
	$result2 = mysqli_query($conn, $query2);
	$row2 = mysqli_fetch_assoc($result2);
	$to_user_id = $row2['UserID'];

	$query3 = "SELECT * FROM `bank account` WHERE `UserID` = '$from_user_id'";
	$result3 = mysqli_query($conn, $query3);
	$row3 = mysqli_fetch_assoc($result3);

	$query4 = "SELECT * FROM `bank account` WHERE `UserID` = '$to_user_id'";
	$result4 = mysqli_query($conn, $query4);
	$row4 = mysqli_fetch_assoc($result4);

	$initialamount1 = $row3['Balance'];
	$initialamount2 = $row4['Balance'];

	if ($amount < $initialamount1)
	{
		$endingamount1 = $initialamount1 - $amount;
		$endingamount2 = $initialamount2 + $amount;

		echo $from_user_id;
		echo $to_user_id;

		echo "<a href=transaction.php?email=$useremail>	<button>Back</button> </a><br><br>";

		$query5 = "UPDATE `bank account` SET `Balance` = '$endingamount1' WHERE `bank account`.`UserID` = '$from_user_id'";

		$query6 = "UPDATE `bank account` SET `Balance` = '$endingamount2' WHERE `bank account`.`UserID` = '$to_user_id'";

		if (mysqli_query($conn, $query5) && mysqli_query($conn, $query6))
		{
			$query = "INSERT INTO `transaction` (`dateOfTransaction`, `Amount`, `SenderID`, `ReceiverID`) VALUES (CURRENT_TIMESTAMP, '$amount', '$from_user_id', '$to_user_id')";
			if (mysqli_query($conn, $query))
			{
				header("Location:transaction.php?email=$useremail");
			}
			else
			{
				header("Location:transaction.php?email=$useremail");	
			}
		} 
		else
		{
			header("Location:transaction.php?email=$useremail");
		}	
	}
	else
	{
		header("Location:transaction.php?email=$useremail");
	}
?>