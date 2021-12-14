<?php

	$useremail = $_GET['email'];
	$UserID = $_GET['UserID'];
	$BankName = $_GET['BankName'];
	$AccountNumber = $_GET['AccountNumber'];
	$IBAN = $_GET['IBAN'];
	$Balance = $_GET['Balance'];

	include('conn_database.php');

	$query = "INSERT INTO `bank account` (`UserID`, `BankName`, `AccountNumber`, `IBAN`, `Balance`) VALUES ('$UserID', '$BankName', '$AccountNumber', '$IBAN', '$Balance');";
	 
	if (mysqli_query($conn, $query))
	{
		header("Location:profile.php?email=$useremail");
	} 
	else
	{
		header("Location:profile.php?email=$useremail");
	}
?>