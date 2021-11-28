<!DOCTYPE html>
<html>
<head>
	<title>Sign Up Form</title>
</head>
<body>
	<a href="main.php"> <button>Back</button> </a>
	<form action="signup.php" method="get">
		<input type="text" name="Name", placeholder="Enter Your Name">
		<br>
		<input type="email" name="email", placeholder="Enter Your email">
		<br>
		<select name="Gender">
			<option value="male">Male</option>
			<option value="female">Female</option>
			<option value="nonbinary">Non-Binary</option>
			<option value="na">Prefer Not to Say</option>
		</select>
		<br>
		<input type="date" name="DateOfBirth", placeholder="Enter Your Date Of Birth">
		<br>
		<input type="password" name="Password1", placeholder="Type Password">
		<input type="password" name="Password2", placeholder="Re-type Password">
		<br>
		<select name="AccountType">
			<option value="business">Business Account</option>
			<option value="freelancer">Freelancer Account</option>
		</select>
		<input type="submit" value="Sign Up">
	</form>
</body>
</html>