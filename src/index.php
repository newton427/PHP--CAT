<!DOCTYPE html>
<html lang="en">

<?php include 'processes/AutRegistration.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <div class="col-md-8 block-9 mb-md-5">
        <form action="" class="bg-light p-5 contact-form" method="POST">
            <!-- Author Full Name -->
            <div class="form-group">
                <input type="text" class="form-control <?php echo $AuthorFullNameErr ? 'is-invalid' : null ?>" placeholder="Author Full Name" id="AuthorFullName" name="AuthorFullName">
                <div class="invalid-feedback">
                    <?php echo $AuthorFullNameErr; ?>
                </div>
            </div>

            <!-- Author Email -->
            <div class="form-group">
                <input type="email" class="form-control  <?php echo $AuthorEmailErr ? 'is-invalid' : null ?>" placeholder="Author Email" id="AuthorEmail" name="AuthorEmail">
                <div class="invalid-feedback">
                    <?php echo $AuthorEmailErr; ?>
                </div>
            </div>

            <!-- Author Address -->
            <div class="form-group">
                <input type="text" class="form-control  <?php echo $AuthorAddressErr ? 'is-invalid' : null ?>" placeholder="Author Address" id="AuthorAddress" name="AuthorAddress">
                <div class="invalid-feedback">
                    <?php echo $AuthorAddressErr ; ?>
                </div>
            </div>   

            <!-- Author DateOfBirth -->
            <div class="form-group">
                <input type="date" class="form-control  <?php echo $AuthorDateOfBirthErr ? 'is-invalid' : null ?> " id="AuthorDateOfBirth" name="AuthorDateOfBirth">
                <div class="invalid-feedback">
                    <?php echo $AuthorDateOfBirthErr ; ?>
                </div>
            </div>  


            <!-- Author Biography -->
            <div class="form-group">
                <textarea name="AuthorBiography" cols="30" rows="7" class="form-control  <?php echo $AuthorBiographyErr ? 'is-invalid' : null ?> " placeholder="Author Biography" id="AuthorBiography" ></textarea>
                <div class="invalid-feedback">
                    <?php echo $AuthorBiographyErr ; ?>
                </div>
            </div>

            <!-- AuthorSuspended -->
            <div  class="form-group">
                <label for="AuthorSuspended">Author Suspended:</label>
                <input type="checkbox" id="AuthorSuspended" name="AuthorSuspended">
            </div>

            <div class="form-group">
                <input name="submit" type="submit" value="SUBMIT" class="btn btn-primary py-3 px-5">
                <a href="ViewAuthors.php" class="btn btn-secondary py-3 px-5">View Authors</a>
            </div>

        </form>
        
    </div>



</body>

</html>