<?php
        include('conn_database.php');
        $useremail = $_GET['email'];

        $query = "SELECT * FROM `users` WHERE `email` = '$useremail'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $AccountType = $row['AccountType']; 
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




<!--Section: Contact v.2-->
<section class="mb-4">

    <!--Section heading-->
    <h2 class=" font-weight-bold text-center my-4 jumbotron mx-4">Update Your Profile</h2>

    <div class="row m-0">

        <!--Grid column-->
        <div class="col-md-12 mb-md-0 mb-5">
            <form action="update.php" method="get">
            <?php echo "<h3>$row[Name]</h3>"; ?>

                <!--Grid row1-->
                <div class="row m-0">

                    <!--Grid columna-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" name="ContactInfo" class="form-control" placeholder="Enter Your Contact Info.">
                            <br>
                        </div>
                    </div>
                    <!--Grid columna-->

                    <!--Grid columnb-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" name="Country" class="form-control" placeholder="Enter Your Country">
                            <br>
                        </div>
                    </div>
                    <!--Grid columnb-->

                </div>
                <!--Grid row1-->
                
                <input type="hidden" name="email", value=<?php echo $useremail; ?>>
                <input type="hidden" name="AccountType", value=<?php echo $AccountType; ?>>

   

            <div class="text-center">
                <input class="btn btn-primary" type="submit" value="Update">
                <?php echo "<a class='btn btn-primary' href=profile.php?email=$useremail>Back</a>" ?>
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