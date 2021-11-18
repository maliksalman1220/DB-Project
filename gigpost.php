<!DOCTYPE html>
<html>
<head>
	<title>Post a Gig</title>
</head>
<body>
	<h1>Post a Gig!</h1>
	<form action="gigupdate.php" method="get">
		<input type="text" name="Title", placeholder="Enter the Title">
		<br><br>
		<input type="text" name="Description", placeholder="Enter the Description"> 
		<!-- maximum 1000 words -->
		<br><br>
		<input type="int" name="minPrice", placeholder="Enter Minimum Price Offer">
		<br><br>
		<input type="int" name="maxPrice", placeholder="Enter Maximum Price Offer">
		<br><br>
		<input type="date" name="expectedDeliveryDate", placeholder="Enter Expected Delivery Date">
		<br><br>
		<input type="submit" value="Post">
	</form>
</body>
</html>