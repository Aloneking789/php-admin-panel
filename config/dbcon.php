<?php
// Define constants for database connection
define('DB_SERVER', 'localhost'); // Change 'localhost' to your database host if it's different
define('DB_USER', 'root'); // Change 'your_username' to your database username
define('DB_PASS', ''); // Change 'your_password' to your database password
define('DB_NAME', 'rdschool'); // Change 'your_database' to your database name

// Attempt to establish a database connection
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
