<?php 
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}

	include('conn_database.php');

	$useremail = $_GET['email'];

	$query = "SELECT * FROM `users` WHERE `users`.`email` != '$useremail'";
	$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Users List</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


	<!-- Boostrap CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Custom css file -->
	<link rel="stylesheet" href="style.css">

</head>
<body>



<!--Section: Contact v.2-->
<section class="mb-4">

    <!--Section heading-->
    <h2 class=" font-weight-bold text-center my-4 jumbotron mx-4">Users List</h2>

    <div class="row m-0">

        <!--Grid column start-->
        <div class="col-md-12 mb-md-0 mb-5 text-center">
           	<?php 
		while ($row = mysqli_fetch_assoc($result))
		{
            $query1 = "SELECT UserID FROM `bank account` WHERE `bank account`.`UserID` = '$row[UserID]'";
            $result1 = mysqli_query($conn, $query1);
            $row1 = mysqli_fetch_assoc($result1);

            if ($row1['UserID'])
            {

			$to_user_id = $row['email'];
			echo "

 <!--Grid row1-->
                <div class='row m-0 text-left'>

                    <!--Grid columna-->
                    <div class='col-md-6'>
                        <div class='md-form mb-0'>
                            <h5 class='bg-secondary btn w-100 m-2 text-light'>$row[Name]</h5>
                        </div>
                    </div>
                    <!--Grid columna-->

                    <!--Grid columnb-->
                    <div class='col-md-6'>
                        <div class='md-form mb-0'>
                            <a class=' w-100 btn btn-primary m-2' href=sendmoney.php?email=$useremail&to_user_id=$to_user_id>Send Money</a>
                            <br>
                        </div>
                    </div>
                    <!--Grid columnb-->

                </div>
                <!--Grid row1-->

			";
            }
			
		}
	         ?>

        <div class="col-md-12">
        	<?php  echo "<a class='btn btn-warning m-2 w-100' href=dashBoard.php?email=$useremail>Back</a>" ?>
        </div>
        
        </div>
        <!--Grid column end-->


    </div>

</section>
<!--Section: Contact v.2-->


<!-- Boostrap CDN -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
</body>
</html>