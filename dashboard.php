<?php
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}
	session_destroy();

	$useremail = $_GET['email'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>LinkUp</title>
</head>
<body>
	<h1>DashBoard</h1>
	<?php 
	echo "<a href=profile.php?email=$useremail> 
			<button>
				Profile
			</button>
		</a>";
	?>
</body>
</html>