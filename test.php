<?php

	include('conn_database.php');

	$handle = fopen("categories.txt", "r");
	if ($handle) {
	    while (($line = fgets($handle)) !== false) {
	        // $query = "INSERT INTO `categories` (`Categories`) VALUES ('$line')";
	        // mysqli_query($conn, $query);
	        echo "\"$line\",";
	    }

	    fclose($handle);
	} else {
	   echo "ERROR";
	} 
?>