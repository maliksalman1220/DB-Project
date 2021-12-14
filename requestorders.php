<?php
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}

	include('conn_database.php');

	$useremail = $_GET['email'];
	$UserID = $_GET['UserID'];
	$AccountType = $_GET['AccountType'];
	$query = "SELECT * FROM `requests` JOIN `requestorders` ON `requests`.`RequestID` = `requestorders`.`RequestID` WHERE `requestorders`.`F_userid` = '$UserID' || `requestorders`.`B_userid` = '$UserID'";
	$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
</head>
<body>
	<table>
	  <tr>
	    <th>Client</th>
	    <th>Order</th>
	    <th>Delivery Days</th>
	    <th>Status</th>
	  </tr>
	  	<?php 
	  		if ($AccountType == "freelancer")
	  		{
	  			while($row = mysqli_fetch_assoc($result))
		  		{
		  			$query1 = "SELECT * FROM `users` JOIN `requestorders` ON `users`.`UserID` = `requestorders`.`B_userid` WHERE `users`.`UserID` = '$row[B_userid]'";
		  			$result1 = mysqli_query($conn, $query1);
		  			$row1 = mysqli_fetch_assoc($result1);
		  			echo "<tr><td>$row1[Name]</td>";
			  		echo "<td>$row[Title]</td>";
			    	echo "<td>$row[DaysToComplete]</td>";
			    	echo "<td>$row[Status]</td></tr>";
		  		}
	  		}
	  		else 
	  		{
	  			while($row = mysqli_fetch_assoc($result))
		  		{
		  			$query1 = "SELECT * FROM `users` JOIN `requestorders` ON `users`.`UserID` = `requestorders`.`F_userid` WHERE `users`.`UserID` = '$row[F_userid]'";
		  			$result1 = mysqli_query($conn, $query1);
		  			$row1 = mysqli_fetch_assoc($result1);
		  			echo "<tr><td>$row1[Name]</td>";
			  		echo "<td>$row[Title]</td>";
			    	echo "<td>$row[DaysToComplete]</td>";
			    	echo "<td>$row[Status]</td></tr>";
		  		}
	  		}	
	  	?>
</table>
</body>
</html>