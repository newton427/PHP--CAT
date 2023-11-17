<?php

require_once 'constants.php';


// Create a connection
$DbConn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if ($DbConn->connect_error) {
    die("Connection failed: " . $DbConn->connect_error);
}

// echo "Connected successfully";