
<?php include 'configs/DbConn.php'; ?>

<?php include 'processes/DelAuth.php'; ?>


<?php

// Fetch data from the table
$sql = "SELECT * FROM authorstb ORDER BY AuthorFullName ASC";
$result = $DbConn->query($sql);

?>







<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Authors</title>
    <!-- Include Bootstrap CSS (assuming you are using Bootstrap for styling) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2>View Authors</h2>
        <a href="index.php" class="btn btn-primary">Add Author</a>
        <table class="table table-black table-hover table-bordered">
            <thead>
                <tr>
                    <th>Author Full Name</th>
                    <th>Author Email</th>
                    <th>Author Address</th>
                    <th>Author Date of Birth</th>
                    <th>Author Biography</th>
                    <th>Author Suspended</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                    echo "<td>" . $row["AuthorFullName"] . "</td>";
                    echo "<td>" . $row["AuthorEmail"] . "</td>";
                    echo "<td>" . $row["AuthorAddress"] . "</td>";
                    echo "<td>" . $row["AuthorDateOfBirth"] . "</td>";
                    echo "<td>" . $row["AuthorBiography"] . "</td>";
                    echo "<td>" . ($row["AuthorSuspended"] ? 'Yes' : 'No') . "</td>";
                    echo "<td><a href='$_SERVER[PHP_SELF]?delete=" . $row['AuthorId'] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
                    echo "<td><a href='EditAuth.php?id=" . $row['AuthorId'] . "' class='btn btn-primary btn-sm'>Edit</a></td>";
                    echo "</tr>";
                }
                } else {
                echo "<tr>
                    <td colspan='6'>No authors found</td>
                </tr>";
                }

                // Close connection
                $DbConn->close();
                ?>

            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS (assuming you are using Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>