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
	<title>LinkUp</title>
	<script src="autocomplete.js"></script>
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
    <h2 class=" font-weight-bold text-center mx-4 jumbotron my-4">Post Your Gig</h2>


    <div class="row m-0">

        <!--Grid column-->
        <div class="col-md-12 mb-md-0 mb-5">
            <form action="gigupdate.php" method="get">

                <!--Grid row1-->
                <div class="row m-0">

                    <!--Grid columna-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for='Title'>Title: </label>
                            <input type="text" name="Title" class="form-control" placeholder="Enter Title Here!">
                            <br>
                        </div>
                    </div>
                    <!--Grid columna-->

                    <!--Grid columnb-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for='Description'>Description: </label>
                            <input type="text" name="Description" class="form-control" placeholder="Enter Description">
                            <br>
                        </div>
                    </div>
                    <!--Grid columnb-->

                </div>
                <!--Grid row1-->


                <!--Grid row2-->
                <div class="row m-0">

                    <!--Grid columna-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for='minPrice'>Minimum Price: </label>
                            <input type="int" name="minPrice" class="form-control" placeholder="Enter Minimum Price">
                            <br>
                        </div>
                    </div>
                    <!--Grid columna-->

                    <!--Grid columnb-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for='maxPrice'>Maximum Price: </label>
                            <input type="int" name="maxPrice" class="form-control" placeholder="Enter Maximum Price">
                            <br>
                        </div>
                    </div>
                    <!--Grid columnb-->

                </div>
                <!--Grid row2-->


                <!--Grid row3-->
                <div class="row m-0">

                    <!--Grid columna-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for='ExpectedDeliveryDays'>Expected Delivey Days: </label>
                            <input type="int" name="ExpectedDeliveryDays" class="form-control" placeholder="Enter Expected Delivery Days">
                            <input type="hidden" name="email", value=<?php echo $useremail; ?>>
                            <br>
                        </div>
                    </div>
                    <!--Grid columna-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for='Category'>Category: </label>
                            <input id="myInput" type="text" name="Category" class="form-control" placeholder="Choose Category">
                            <input type="hidden" name="email", value=<?php echo $useremail; ?>>
                            <br>
                        </div>
                    </div>

                    <!--Grid columnb-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">

                        </div>
                    </div>
                    <!--Grid columnb-->
                

                </div>
                <!--Grid row3-->


            <div class="text-center">
            	<input class="btn btn-primary" type="submit" value="Post">
            	<a href=dashboard.php?email=$useremail class="btn btn-primary">Back</a>
            	<a href=profile.php?email=$useremail class="btn btn-primary">Profile</a>
                
            </div>

            </form>


        </div>
        <!--Grid column-->


    </div>

</section>
<!--Section: Contact v.2-->

	<!-- <?php 
	// echo "<a href=dashboard.php?email=$useremail>	<button>Back</button> </a>";
	// echo "<br><br>";
	// echo "<a href=profile.php?email=$useremail>	<button>Profile</button> </a>";
	// echo "<br><br><h1>Post Your Gig</h1>";
	?>


	<form autocomplete="off" action="gigupdate.php" method="get">
		<h5>Title</h5>
		<input type="text" name="Title", placeholder="Enter Title Here!">
		<br>
		<h5>Description</h5>
		<input type="text" name="Description", placeholder="Enter Description">
		<br>
		<h5>Minimum Price</h5>
		<input type="int" name="minPrice", placeholder="Enter Minimum Price">
		<br>
		<h5>Maximum Price</h5>
		<input type="int" name="maxPrice", placeholder="Enter Maximum Price">
		<br>
		<h5>Expected Delivery Days</h5>
		<input type="int" name="ExpectedDeliveryDays", placeholder="Enter Expected Delivery Days">
		<br>
		<input type="hidden" name="email", value=<?php //echo $useremail; ?>> 
		<br>
		<h5>Category</h5>
    	<input id="myInput" type="text" name="Category" placeholder="Category">
		<input type="submit" value="Post">
	</form> -->

<script type="text/javascript">
	var countries = ["All Web, Mobile & Software Dev ","Desktop Software Development ","Ecommerce Development ","Game Development ","Mobile Development ","Product Management ","QA & Testing ","Scripts & Utilities ","Web Development ","Web & Mobile Design ","Other - Software Development ","All Design & Creative ","Animation ","Audio Production ","Graphic Design ","Illustration ","Logo Design & Branding Photography ","Presentations ","Video Production ","Voice Talent ","Other - Design & Creative ","All Admin Support ","Data Entry ","Personal / Virtual Assistant ","Project Management ","Transcription ","Web Research ","Other - Admin Support ","All Customer Service ","Customer Service ","Technical Support ","Other - Customer Service ","All IT & Networking ","Database Administration ","ERP / CRM Software ","All Writing ","Academic Writing & Research ","Article & Blog Writing ","All Sales& Marketing", "Programming", "Tutoring"];
</script>

<script>
autocomplete(document.getElementById("myInput"), countries);
</script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>