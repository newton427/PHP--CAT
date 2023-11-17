<?php include 'configs/DbConn.php'; ?>

<?php
// Check if the 'id' parameter is set and is a valid numeric value
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $editId = $_GET['id'];

    // Fetch the author details based on the 'id' parameter
    $editSql = "SELECT * FROM authorstb WHERE AuthorId = $editId";
    $editResult = $DbConn->query($editSql);

    // Check if the author exists
    if ($editResult->num_rows > 0) {
        $editAuthor = $editResult->fetch_assoc();
    } else {
        // Redirect to the main page if the author doesn't exist
        header("Location: index.php");
        exit();
    }
} else {
    // Redirect to the main page if 'id' is not set or is not a valid numeric value
    header("Location: index.php");
    exit();
}


$newAuthorFullName = $newAuthorEmail = $newAuthorAddress = $newAuthorDateOfBirth = $newAuthorBiography = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // $newAuthorFullName = htmlspecialchars(trim($_POST['AuthorFullName']));

    // Validate Author Full Name
    if (empty($_POST["AuthorFullName"])) {
        $AuthorFullNameErr = "Author Full Name is required";
    } else {
        $newAuthorFullName = test_input($_POST["AuthorFullName"]);
        // Check if the Author Full Name contains only letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $newAuthorFullName)) {
            $AuthorFullNameErr = "Only letters and white space allowed";
        }
    }
        
    // Validate Author Email
    if (empty($_POST["AuthorEmail"])) {
        $AuthorEmailErr = "Author Email is required";
    } else {
        $newAuthorEmail = test_input($_POST["AuthorEmail"]);
        // Check if the Author Email is valid
        if (!filter_var($newAuthorEmail, FILTER_VALIDATE_EMAIL)) {
            $AuthorEmailErr = "Invalid email format";
        }
    }

    // Validate Author Address
    if (empty($_POST["AuthorAddress"])) {
        $AuthorAddressErr = "Author Address is required";
    } else {
        $newAuthorAddress = test_input($_POST["AuthorAddress"]);
    }

      // Validate Author Date of Birth
      if (empty($_POST["AuthorDateOfBirth"])) {
        $AuthorDateOfBirthErr = "Author Date of Birth is required";
    } else {
        $newAuthorDateOfBirth = test_input($_POST["AuthorDateOfBirth"]);
    }

    // Validate Author Biography
    if (empty($_POST["AuthorBiography"])) {
        $AuthorBiographyErr = "Author Biography is required";
    } else {
        $newAuthorBiography = test_input($_POST["AuthorBiography"]);
    }

// If there are no errors, update data in the database
 if (empty($AuthorFullNameErr) && empty($AuthorEmailErr)&& empty($AuthorAddressErr) && empty($AuthorDateOfBirthErr) && empty($AuthorBiographyErr)) {

     // Update the author details in the database
     $updateSql = "UPDATE authorstb SET 
     AuthorFullName = '$newAuthorFullName',
     AuthorEmail = '$newAuthorEmail',
     AuthorAddress = '$newAuthorAddress',
     AuthorDateOfBirth = '$newAuthorDateOfBirth',
     AuthorBiography = '$newAuthorBiography'
     WHERE AuthorId = $editId";

    if ($DbConn->query($updateSql) === TRUE) {
        // Redirect to the main page after editing
        header("Location: ViewAuthors.php");
        exit();
    } else {
        // Handle the case where the update fails
        echo "Error updating record: " . $DbConn->error;
    }
 }
}

// Function to clean and sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>



<!DOCTYPE html>


<html lang="en">
    
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
            <h2>Edit Author</h2>
            <!-- Author Full Name -->
            <div class="form-group">
                <input type="text" class="form-control <?php echo $AuthorFullNameErr ? 'is-invalid' : null ?> " value="<?php echo $editAuthor['AuthorFullName']; ?>" placeholder="Author Full Name" id="AuthorFullName" name="AuthorFullName">
                <div class="invalid-feedback">
                    <?php echo $AuthorFullNameErr; ?>
                </div>
            </div>

            <!-- Author Email -->
            <div class="form-group">
                <input type="email" class="form-control <?php echo $AuthorEmailErr ? 'is-invalid' : null ?>" value="<?php echo $editAuthor['AuthorEmail']; ?>" placeholder="Author Email" id="AuthorEmail" name="AuthorEmail">
                <div class="invalid-feedback">
                    <?php echo $AuthorEmailErr; ?>
                </div> 
            </div>

            <!-- Author Address -->
            <div class="form-group">
                <input type="text" class="form-control <?php echo $AuthorAddressErr ? 'is-invalid' : null ?>" value="<?php echo $editAuthor['AuthorAddress']; ?>" placeholder="Author Address" id="AuthorAddress" name="AuthorAddress">
                <div class="invalid-feedback">
                    <?php echo $AuthorAddressErr ; ?>
                </div>
            </div>   

            <!-- Author DateOfBirth -->
            <div class="form-group">
                <input type="date" class="form-control  <?php echo $AuthorDateOfBirthErr ? 'is-invalid' : null ?>" value="<?php echo $editAuthor['AuthorDateOfBirth']; ?>" id="AuthorDateOfBirth" name="AuthorDateOfBirth">
                <div class="invalid-feedback">
                    <?php echo $AuthorDateOfBirthErr ; ?>
                </div> 
            </div>  

            <!-- Author Biography -->
            <div class="form-group">
                <textarea name="AuthorBiography" cols="30" rows="7" class="form-control <?php echo $AuthorBiographyErr ? 'is-invalid' : null ?>" value="<?php echo $editAuthor['AuthorBiography']; ?> placeholder="Author Biography" id="AuthorBiography" ></textarea>
                <div class="invalid-feedback">
                    <?php echo $AuthorBiographyErr ; ?>
                </div>
            </div>
            
            <div class="form-group">
                <input name="upload" type="submit" value="EDIT" class="btn btn-primary py-3 px-5" >
            </div>

            <!-- <div><a href="blog.php">BACK</a></div> -->
        </form>

    </div>


   
  </body>
</html>