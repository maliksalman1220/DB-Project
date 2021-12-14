<?php
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}

	include('conn_database.php');

	$useremail = $_GET['email'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Link Up</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Boostrap CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Custom css file -->
	<link rel="stylesheet" href="style.css">

</head>
<body>

    <div class="text-center mt-0 pt-0 mx-3">    
		<?php
        echo "<a class='btn btn-primary m-1' href=dashboard.php?email=$useremail> Back </a><br><br>";
        echo "<a class='btn btn-primary m-1' href=bankdetails.php?email=$useremail> Bank Details </a>";
        ?>
    </div>

        <?php 
		$query = "SELECT * FROM `users` WHERE `email` = '$useremail'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);


		echo "
<!--Section: Contact v.4-->
<section class='mb-4'>

    <!--Section heading-->
    <h2 class='font-weight-bold text-center my-4 jumbotron mx-4'>Profile</h2>

    <div class='row m-0'>

        <!--Grid column-->
        <div class='col-md-12 mb-md-0 mb-5'>
            <form method='post'>

                <!--Grid row1-->
                <div class='row m-0'>

                    <!--Grid columna-->
                    <div class='col-md-6'>
                        <div class='md-form mb-0'>
                            <label for='name'>Name: </label>
                            <input disabled type='text' name='name' class='form-control' value='$row[Name]'>
                            <br>
                        </div>
                    </div>
                    <!--Grid columna-->

                    <!--Grid columnb-->
                    <div class='col-md-6'>
                        <div class='md-form mb-0'>
                            <label for='email'>Email: </label>
                            <input disabled type='text' name='email' class='form-control' value='$row[email]'>
                            <br>
                        </div>
                    </div>
                    <!--Grid columnb-->

                </div>
                <!--Grid row1-->



                <!--Grid row2-->
                <div class='row m-0'>

                    <!--Grid columna-->
                    <div class='col-md-6'>
                        <div class='md-form mb-0'>
                            <label for='gender'>Gender: </label>
                            <input disabled type='text' name='gender' class='form-control' value='$row[Gender]'>
                            <br>
                        </div>
                    </div>
                    <!--Grid columna-->

                    <!--Grid columnb-->
                    <div class='col-md-6'>
                        <div class='md-form mb-0'>
                            <label for='DOB'>Date of Birth: </label>
                            <input disabled type='text' name='DOB' class='form-control' value='$row[DateOfBirth]'>
                            <br>
                        </div>
                    </div>
                    <!--Grid columnb-->

                </div>
                <!--Grid row2-->


                <!--Grid row3-->
                <div class='row m-0'>

                    <!--Grid columna-->
                    <div class='col-md-6'>
                        <div class='md-form mb-0'>
                            <label for='contact'>Contact: </label>
                            <input disabled type='text' name='contact' class='form-control' value='$row[ContactInfo]'>
                            <br>
                        </div>
                    </div>
                    <!--Grid columna-->

                    <!--Grid columnb-->
                    <div class='col-md-6'>
                        <div class='md-form mb-0'>
                            <label for='country'>Country: </label>
                            <input disabled type='text' name='country' class='form-control' value='$row[Country]'>
                            <br>
                        </div>
                    </div>
                    <!--Grid columnb-->

                </div>
                <!--Grid row3-->";

                if ($row['AccountType'] == "freelancer")
                {
                    echo "<h5>Skills:</h5>";
                    $query1 = "SELECT * FROM `freelancers` JOIN `skills` ON `freelancers`.`UserID` = `skills`.`UserID` WHERE `freelancers`.`UserID` = $row[UserID]";
                    $result1 = mysqli_query($conn, $query1);

                    while ($row1 = mysqli_fetch_assoc($result1)) 
                    {
                        echo "$row1[Skills]<br>";
                    }
                    echo "<br><a href=addskills.php?email=$useremail> <button>Add Skills</button> </a>";
                }

            echo "<div class='text-center'>
                <a class='btn btn-primary' href=dashboard.php?email=$useremail>Back</a>
                <a class='btn btn-primary' href=profileupdate.php?email=$useremail>Update Profile</a>
            </div>

            </form>


        </div>
        <!--Grid column-->


    </div>

</section>
<!--Section: Contact v.4-->

			";
		?>

<!-- Boostrap CDN -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>