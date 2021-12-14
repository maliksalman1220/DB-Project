<?php 
	session_start();
	if (isset($_SESSION['login']) == false)
	{
		header('Location:login.php');
	}

	include('conn_database.php');

	$useremail = $_GET['email'];
	$to_user_email = $_GET['to_user_id'];
?>


<!DOCTYPE html>
<html>
<head>
	<title>Chatbox</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Boostrap CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Custom css file -->
	<link rel="stylesheet" href="style.css">

</head>
<body>



<!--Section: Contact v.3-->
<section class="mb-4">

    <!--Section heading-->
    <h2 class="jumbotron font-weight-bold text-center my-4 mx-4">Payment Gateway</h2>


    <div class="row m-0">

        <!--Grid column-->
        <div class="col-md-12 mb-md-0 mb-5">
            <form action="insert_money.php" method="get">

                <!--Grid row1-->
                <div class="row m-0">

                    <!--Grid columna-->
                    <div class="col-md-6">
                        <div class="md-form m-1 ">
                            <input type="int" name="amount" class="form-control" placeholder="Enter Amount Here">
                            <input type="hidden" name="from_user_id", value=<?php echo $useremail; ?>>
		            <input type="hidden" name="to_user_id", value=<?php echo $to_user_email; ?>>
                            <br>
                        </div>
                    </div>
                    <!--Grid columna-->

                    <!--Grid columnb-->
                    <div class="col-md-3">
                        <div class="md-form m-1">
                             <?php echo "<a class='btn btn-primary w-100' href=transaction.php?email=$useremail>Back</a>"  ?>
                            <br>
                        </div>
                    </div>
                    <!--Grid columnb-->

                    <!--Grid columnc-->
                    <div class="col-md-3">
                        <div class="md-form m-1">
                             <input type="submit" value="send" class="btn btn-primary w-100">
                            <br>
                        </div>
                    </div>
                    <!--Grid columnc-->                    

                </div>
                <!--Grid row1-->

            </form>

        </div>
        <!--Grid column-->


    </div>

</section>
<!--Section: Contact v.3-->







<!-- Boostrap CDN -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>