<!DOCTYPE html>
<html>
<head>
	<title>Sign Up Form</title>
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
    <h2 class=" font-weight-bold text-center my-4">Registration</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>

    <div class="row m-0">

        <!--Grid column-->
        <div class="col-md-12 mb-md-0 mb-5">
            <form action="signup.php" method="get">

                <!--Grid row1-->
                <div class="row m-0">

                    <!--Grid columna-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                            <br>
                        </div>
                    </div>
                    <!--Grid columna-->

                    <!--Grid columnb-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" name="email" class="form-control" placeholder="Enter Your email">
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
                            <input type="date" name="DateOfBirth" class="form-control" placeholder="Enter Your Date Of Birth">
                            <br>
                        </div>
                    </div>
                    <!--Grid columna-->

                    <!--Grid columnb-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <select name="Gender" class="form-control">
								<option value="male">Male</option>
								<option value="female">Female</option>
								<option value="nonbinary">Non-Binary</option>
								<option value="na">Prefer Not to Say</option>
							</select>
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
                            <input type="password" name="Password1" class="form-control" placeholder="Type Password">
                            <br>
                        </div>
                    </div>
                    <!--Grid columna-->

                    <!--Grid columnb-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="password" name="Password2" class="form-control" placeholder="Re-type Password">
                            <br>
                        </div>
                    </div>
                    <!--Grid columnb-->

                </div>
                <!--Grid row3-->


               <!--Grid row4-->
                <div class="row m-0">

                    <!--Grid columna-->
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <select name="AccountType" class="form-control">
								<option value="business">Business Account</option>
								<option value="freelancer">Freelancer Account</option>
							</select>
                            <br>
                        </div>
                    </div>
                    <!--Grid columna-->

                </div>
                <!--Grid row4-->

            <div class="text-center">
                <input class="btn btn-primary" type="submit" value="Sign Up">
                <a href="main.php" class="btn btn-primary">Back</a>
            </div>

            </form>


        </div>
        <!--Grid column-->


    </div>

</section>
<!--Section: Contact v.2-->





<!-- Boostrap CDN -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>