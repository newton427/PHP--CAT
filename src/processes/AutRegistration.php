<?php include 'configs/DbConn.php'; ?>


<?php

// Define variables and set to empty values
$AuthorFullNameErr = $AuthorEmailErr = $AuthorAddress = $AuthorDateOfBirth = $AuthorBiography = $AuthorSuspended = "";
$AuthorFullName = $AuthorEmail = $AuthorAddressErr = $AuthorDateOfBirthErr = $AuthorBiographyErr = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate Author Full Name
    if (empty($_POST["AuthorFullName"])) {
        $AuthorFullNameErr = "Author Full Name is required";
    } else {
        $AuthorFullName = test_input($_POST["AuthorFullName"]);
        // Check if the Author Full Name contains only letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $AuthorFullName)) {
            $AuthorFullNameErr = "Only letters and white space allowed";
        }
    }

    // Validate Author Email
    if (empty($_POST["AuthorEmail"])) {
        $AuthorEmailErr = "Author Email is required";
    } else {
        $AuthorEmail = test_input($_POST["AuthorEmail"]);
        // Check if the Author Email is valid
        if (!filter_var($AuthorEmail, FILTER_VALIDATE_EMAIL)) {
            $AuthorEmailErr = "Invalid email format";
        }
    }

     // Validate Author Address
     if (empty($_POST["AuthorAddress"])) {
        $AuthorAddressErr = "Author Address is required";
    } else {
        $AuthorAddress = test_input($_POST["AuthorAddress"]);
    }

    // Validate Author Date of Birth
    if (empty($_POST["AuthorDateOfBirth"])) {
        $AuthorDateOfBirthErr = "Author Date of Birth is required";
    } else {
        $AuthorDateOfBirth = test_input($_POST["AuthorDateOfBirth"]);
    }

    // Validate Author Biography
    if (empty($_POST["AuthorBiography"])) {
        $AuthorBiographyErr = "Author Biography is required";
    } else {
        $AuthorBiography = test_input($_POST["AuthorBiography"]);
    }

    // Get the value of AuthorSuspended (checkbox)
    $AuthorSuspended = isset($_POST["AuthorSuspended"]) ? 1 : 0;

    // If there are no errors, insert data into the database
    if (empty($AuthorFullNameErr) && empty($AuthorEmailErr)&& empty($AuthorAddressErr) && empty($AuthorDateOfBirthErr) && empty($AuthorBiographyErr)) {
        
        // Insert data into the table
        $sql = "INSERT INTO authorstb (AuthorFullName, AuthorEmail, AuthorAddress, AuthorDateOfBirth, AuthorBiography, AuthorSuspended)
         VALUES ('$AuthorFullName', '$AuthorEmail', '$AuthorAddress', '$AuthorDateOfBirth', '$AuthorBiography', '$AuthorSuspended')";

        if ($DbConn->query($sql) === TRUE) {
            // Success
            header('location: ViewAuthors.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $DbConn->close();
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
